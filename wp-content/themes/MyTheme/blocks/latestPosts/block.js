import {
  store,
  getContext,
  getElement,
  useEffect,
  useState,
} from "@wordpress/interactivity";
import "./index.css";
import "preact/debug";

/**
 * WordPress Interactivity API store for latest posts block.
 * Manages loading state and post fetching logic.
 */
const { state } = store("latestposts", {
  actions: {
    /**
     * Load additional posts and append them to the grid.
     * Fetches from WordPress REST API and updates DOM via template cloning.
     */
    async loadMorePosts() {
      const { ref } = getElement();
      const context = getContext();

      // Піднімаємось до основного блоку (дія викликається на кнопці)
      const blockElement = ref.closest('[data-wp-interactive="latestposts"]');
      const container = blockElement.querySelector(".latest-posts-grid");
      const template = blockElement.querySelector("#post-card-template");

      if (!container || !template) {
        return;
      }

      if (state.isLoading) {
        return;
      }

      state.isLoading = true;

      try {
        const response = await fetch(
          `/wp-json/wp/v2/posts?per_page=${state.postsPerPage}&offset=${context.offset}&_fields=id,date,title,content,link,featured_media`,
          {
            headers: {
              "Content-Type": "application/json",
            },
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const posts = await response.json();

        if (posts.length === 0) {
          state.isLoading = false;
          return;
        }

        const postsWithImages = await Promise.all(
          posts.map(async (post) => {
            let imageUrl = null;
            if (post.featured_media) {
              try {
                const mediaResponse = await fetch(
                  `/wp-json/wp/v2/media/${post.featured_media}`
                );
                if (mediaResponse.ok) {
                  const media = await mediaResponse.json();
                  imageUrl = media.source_url;
                }
              } catch (error) {
                console.warn(
                  `Failed to fetch featured image for post ${post.id}:`,
                  error
                );
              }
            }
            return { ...post, imageUrl };
          })
        );

        postsWithImages.forEach((post) => {
          const card = template.content.cloneNode(true);

          const titleLink = card.querySelector("[data-title]");
          const excerpt = card.querySelector("[data-excerpt]");
          const date = card.querySelector("[data-date]");
          const link = card.querySelector("[data-link]");
          const image = card.querySelector("[data-image]");
          const imageContainer = card.querySelector("[data-image-container]");

          titleLink.textContent = post.title.rendered;
          titleLink.href = post.link;

          excerpt.textContent =
            post.content.rendered.replace(/<[^>]*>/g, "").substring(0, 150) +
            "...";

          const dateObj = new Date(post.date);
          date.textContent = dateObj.toLocaleDateString("uk-UA", {
            year: "numeric",
            month: "long",
            day: "numeric",
          });

          link.href = post.link;

          if (post.imageUrl) {
            image.src = post.imageUrl;
            image.alt = post.title.rendered;
            imageContainer.style.display = "";
          }

          container.appendChild(card);
        });

        context.offset += posts.length;

        if (context.offset >= state.totalPosts) {
          const button = blockElement.querySelector(".latest-posts-load-more");
          if (button) {
            button.style.display = "none";
          }
        }
      } catch (error) {
        console.error("❌ Error loading more posts:", error);
      } finally {
        state.isLoading = false;
      }
    },
  },
  callbacks: {
    logInView: () => {
      const isInView = useInView();
      useEffect(() => {
        if (isInView) {
          console.log("Inside");
        } else {
          console.log("Outside");
        }
      });
    },
  },
});

// Unlike `data-wp-init` and `data-wp-watch`, you can use any hooks inside
// `data-wp-run`
const useInView = () => {
  const [inView, setInView] = useState(false);
  useEffect(() => {
    const { ref } = getElement();
    const observer = new IntersectionObserver(([entry]) => {
      setInView(entry.isIntersecting);
    });
    observer.observe(ref);
    return () => ref && observer.unobserve(ref);
  }, []);
  return inView;
};
