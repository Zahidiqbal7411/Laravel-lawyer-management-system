// Blog Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize blog functionality
    initBlogSearch();
    initCategoryFilter();
    initLoadMore();
    initNewsletterForm();
    initBlogAnimations();
});

// Blog Search Functionality
function initBlogSearch() {
    const searchInput = document.querySelector('.search-input');
    const searchBtn = document.querySelector('.search-btn');
    const blogCards = document.querySelectorAll('.blog-card');

    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();

        blogCards.forEach(card => {
            const title = card.querySelector('h2, h3').textContent.toLowerCase();
            const content = card.querySelector('p').textContent.toLowerCase();
            const tags = Array.from(card.querySelectorAll('.tag')).map(tag => tag.textContent.toLowerCase());

            const isMatch = title.includes(searchTerm) ||
                           content.includes(searchTerm) ||
                           tags.some(tag => tag.includes(searchTerm));

            if (searchTerm === '' || isMatch) {
                card.style.display = 'block';
                card.style.animation = 'fadeInUp 0.6s ease';
            } else {
                card.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', performSearch);
    searchBtn.addEventListener('click', performSearch);
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
}

// Category Filter Functionality
function initCategoryFilter() {
    const categoryBtns = document.querySelectorAll('.category-btn');
    const blogCards = document.querySelectorAll('.blog-card');

    function updateNoBlogsMessage() {
        let noBlogsMsg = document.querySelector('.no-blogs-message');
        const visibleCards = Array.from(blogCards).filter(card => card.style.display !== 'none');
        if (!noBlogsMsg) {
            noBlogsMsg = document.createElement('p');
            noBlogsMsg.className = 'no-blogs-message';
            noBlogsMsg.textContent = 'No blog posts found for this category.';
            document.querySelector('.blog-grid').appendChild(noBlogsMsg);
        }
        noBlogsMsg.style.display = visibleCards.length === 0 ? 'block' : 'none';
    }

    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const selectedCategory = this.getAttribute('data-category');

            // Update active button
            categoryBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            // Filter blog cards
            blogCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');

                if (selectedCategory === 'all' || cardCategory === selectedCategory) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.6s ease';
                } else {
                    card.style.display = 'none';
                }
            });
            updateNoBlogsMessage();
        });
    });
    // Initial check
    updateNoBlogsMessage();
}

// Load More Functionality
function initLoadMore() {
    const loadMoreBtn = document.querySelector('.load-more-btn');
    let currentPage = 1;
    const postsPerPage = 6;
    let allPosts = [];

    // Simulate loading more posts
    function loadMorePosts() {
        loadMoreBtn.textContent = 'Loading...';
        loadMoreBtn.disabled = true;

        // Simulate API call delay
        setTimeout(() => {
            // Add more sample posts
            const samplePosts = [
                {
                    category: 'web-development',
                    title: 'Optimizing Website Performance for Better SEO',
                    excerpt: 'Learn the best practices for improving your website speed and performance to boost search engine rankings.',
                    author: 'Jennifer Lee',
                    date: 'March 1, 2024',
                    tags: ['SEO', 'Performance', 'Web']
                },
                {
                    category: 'mobile-apps',
                    title: 'The Rise of Progressive Web Apps (PWAs)',
                    excerpt: 'Discover how Progressive Web Apps are changing the mobile development landscape and why you should consider them.',
                    author: 'Robert Kim',
                    date: 'February 28, 2024',
                    tags: ['PWA', 'Mobile', 'Progressive']
                },
                {
                    category: 'design',
                    title: 'Design Systems: Building Consistent User Interfaces',
                    excerpt: 'Explore the importance of design systems in creating cohesive and maintainable user interfaces.',
                    author: 'Maria Garcia',
                    date: 'February 25, 2024',
                    tags: ['Design Systems', 'UI', 'Consistency']
                }
            ];

            const blogGrid = document.querySelector('.blog-grid');

            samplePosts.forEach((post, index) => {
                const postElement = createBlogPost(post);
                blogGrid.appendChild(postElement);

                // Add animation delay
                setTimeout(() => {
                    postElement.style.animation = 'fadeInUp 0.6s ease';
                }, index * 100);
            });

            loadMoreBtn.textContent = 'Load More Articles';
            loadMoreBtn.disabled = false;
            currentPage++;

            // Hide button if no more posts (simulated)
            if (currentPage > 3) {
                loadMoreBtn.style.display = 'none';
            }
        }, 1000);
    }

    function createBlogPost(post) {
        const article = document.createElement('article');
        article.className = 'blog-card';
        article.setAttribute('data-category', post.category);

        article.innerHTML = `
            <div class="blog-image">
                <img src="https://images.unsplash.com/photo-${Math.floor(Math.random() * 1000000)}?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="${post.title}">
                <div class="blog-category">${getCategoryName(post.category)}</div>
            </div>
            <div class="blog-content">
                <div class="blog-meta">
                    <span class="blog-date">${post.date}</span>
                    <span class="blog-author">by ${post.author}</span>
                </div>
                <h3>${post.title}</h3>
                <p>${post.excerpt}</p>
                <div class="blog-tags">
                    ${post.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
                </div>
                <a href="#" class="read-more">Read More →</a>
            </div>
        `;

        return article;
    }

    function getCategoryName(category) {
        const categories = {
            'web-development': 'Web Development',
            'mobile-apps': 'Mobile Apps',
            'design': 'Design',
            'technology': 'Technology',
            'business': 'Business'
        };
        return categories[category] || category;
    }

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', loadMorePosts);
    }
}

// Newsletter Form Functionality
function initNewsletterForm() {
    const newsletterForm = document.querySelector('.newsletter-form');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();

            if (email) {
                // Simulate newsletter subscription
                const button = this.querySelector('button');
                const originalText = button.textContent;

                button.textContent = 'Subscribing...';
                button.disabled = true;

                setTimeout(() => {
                    button.textContent = 'Subscribed!';
                    button.style.background = '#27ae60';
                    emailInput.value = '';

                    setTimeout(() => {
                        button.textContent = originalText;
                        button.disabled = false;
                        button.style.background = '';
                    }, 2000);
                }, 1000);
            }
        });
    }
}

// Blog Animations
function initBlogAnimations() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe blog cards
    document.querySelectorAll('.blog-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add loading animation for images
document.querySelectorAll('.blog-image img').forEach(img => {
    img.addEventListener('load', function() {
        this.style.opacity = '1';
    });

    img.style.opacity = '0';
    img.style.transition = 'opacity 0.3s ease';
});

// Enhanced search with debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Apply debouncing to search
const debouncedSearch = debounce(function() {
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        const event = new Event('input');
        searchInput.dispatchEvent(event);
    }
}, 300);

// Add search input event listener with debouncing
const searchInput = document.querySelector('.search-input');
if (searchInput) {
    searchInput.addEventListener('input', debouncedSearch);
}
