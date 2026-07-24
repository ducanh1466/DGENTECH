/* ============================================
   DGENTECH — Cart JavaScript
   Uses localStorage to manage cart state
   ============================================ */

const DGENCart = {

    STORAGE_KEY: 'dgentech-cart',

    // Get cart from localStorage
    getCart: function () {
        const data = localStorage.getItem(this.STORAGE_KEY);
        return data ? JSON.parse(data) : [];
    },

    // Save cart to localStorage
    saveCart: function (cart) {
        localStorage.setItem(this.STORAGE_KEY, JSON.stringify(cart));
        this.updateBadge();
        this.updateCartPage();
    },

    // Add item to cart
    addItem: function (product) {
        let cart = this.getCart();
        const existingIndex = cart.findIndex(function (item) {
            return item.id === product.id;
        });

        if (existingIndex > -1) {
            cart[existingIndex].quantity += (product.quantity || 1);
        } else {
            cart.push({
                id: product.id,
                name: product.name,
                price: product.price,
                image: product.image,
                category: product.category || '',
                quantity: product.quantity || 1
            });
        }

        this.saveCart(cart);
        this.showNotification('Đã thêm vào giỏ hàng!');
    },

    // Remove item from cart
    removeItem: function (productId) {
        let cart = this.getCart();
        cart = cart.filter(function (item) {
            return item.id !== productId;
        });
        this.saveCart(cart);
    },

    // Update item quantity
    updateQuantity: function (productId, quantity) {
        let cart = this.getCart();
        const item = cart.find(function (item) {
            return item.id === productId;
        });
        if (item) {
            item.quantity = Math.max(1, quantity);
            this.saveCart(cart);
        }
    },

    // Get total items count
    getTotalItems: function () {
        return this.getCart().reduce(function (total, item) {
            return total + item.quantity;
        }, 0);
    },

    // Get total price
    getTotalPrice: function () {
        return this.getCart().reduce(function (total, item) {
            return total + (item.price * item.quantity);
        }, 0);
    },

    // Clear cart
    clearCart: function () {
        localStorage.removeItem(this.STORAGE_KEY);
        this.updateBadge();
        this.updateCartPage();
    },

    // Format price VND
    formatPrice: function (price) {
        return new Intl.NumberFormat('vi-VN').format(price) + '₫';
    },

    // Update cart badge in navbar
    updateBadge: function () {
        const badges = document.querySelectorAll('.cart-badge');
        const totalItems = this.getTotalItems();
        badges.forEach(function (badge) {
            badge.textContent = totalItems;
            badge.style.display = totalItems > 0 ? 'flex' : 'none';
        });
    },

    // Show add-to-cart notification
    showNotification: function (message) {
        // Remove existing notification
        const existing = document.querySelector('.cart-notification');
        if (existing) existing.remove();

        const notification = document.createElement('div');
        notification.className = 'cart-notification';
        notification.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + message;
        notification.style.cssText = 'position:fixed;top:20px;right:20px;background:var(--success);color:#fff;padding:12px 24px;border-radius:var(--radius-full);font-weight:600;font-size:0.9rem;z-index:9999;box-shadow:0 4px 15px rgba(34,197,94,0.3);animation:fadeInUp 0.3s ease;display:flex;align-items:center;gap:8px;';
        document.body.appendChild(notification);

        setTimeout(function () {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-10px)';
            notification.style.transition = 'all 0.3s ease';
            setTimeout(function () { notification.remove(); }, 300);
        }, 2500);
    },

    // Update cart page (if on cart page)
    updateCartPage: function () {
        const cartTableBody = document.getElementById('cartTableBody');
        if (!cartTableBody) return;

        const cart = this.getCart();

        if (cart.length === 0) {
            cartTableBody.innerHTML = '<tr><td colspan="6" class="text-center py-5"><div><i class="bi bi-cart-x" style="font-size:3rem;color:var(--text-muted)"></i><p class="mt-2 text-muted">Giỏ hàng trống</p><a href="' + (typeof BASE_URL !== 'undefined' ? BASE_URL : '') + '?action=products" class="btn btn-accent mt-2">Tiếp tục mua sắm</a></div></td></tr>';
        } else {
            let html = '';
            const self = this;
            cart.forEach(function (item) {
                html += '<tr data-id="' + item.id + '">';
                html += '<td><div class="d-flex align-items-center gap-3"><img src="' + item.image + '" class="cart-product-img" alt=""><div><div class="cart-product-name">' + item.name + '</div><small class="text-muted">' + item.category + '</small></div></div></td>';
                html += '<td>' + self.formatPrice(item.price) + '</td>';
                html += '<td><div class="quantity-selector"><button class="qty-minus" onclick="DGENCart.updateQuantity(\'' + item.id + '\', ' + (item.quantity - 1) + ')">−</button><input type="number" class="qty-input" value="' + item.quantity + '" min="1" onchange="DGENCart.updateQuantity(\'' + item.id + '\', parseInt(this.value))"><button class="qty-plus" onclick="DGENCart.updateQuantity(\'' + item.id + '\', ' + (item.quantity + 1) + ')">+</button></div></td>';
                html += '<td class="fw-bold">' + self.formatPrice(item.price * item.quantity) + '</td>';
                html += '<td><button class="btn-remove" onclick="DGENCart.removeItem(\'' + item.id + '\')"><i class="bi bi-trash3"></i></button></td>';
                html += '</tr>';
            });
            cartTableBody.innerHTML = html;
        }

        // Update summary
        const subtotalEl = document.getElementById('cartSubtotal');
        const totalEl = document.getElementById('cartTotal');
        const shippingEl = document.getElementById('cartShipping');
        const totalPrice = this.getTotalPrice();
        const shipping = cart.length > 0 ? (totalPrice >= 2000000 ? 0 : 30000) : 0;

        if (subtotalEl) subtotalEl.textContent = this.formatPrice(totalPrice);
        if (shippingEl) shippingEl.textContent = shipping === 0 ? 'Miễn phí' : this.formatPrice(shipping);
        if (totalEl) totalEl.textContent = this.formatPrice(totalPrice + shipping);
    }
};

// Initialize cart badge on page load
document.addEventListener('DOMContentLoaded', function () {
    DGENCart.updateBadge();

    // Initialize cart page if on cart page
    DGENCart.updateCartPage();

    // Handle "Add to cart" buttons
    document.querySelectorAll('.btn-add-to-cart').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const product = {
                id: btn.getAttribute('data-id'),
                name: btn.getAttribute('data-name'),
                price: parseInt(btn.getAttribute('data-price')),
                image: btn.getAttribute('data-image'),
                category: btn.getAttribute('data-category') || '',
                quantity: 1
            };
            DGENCart.addItem(product);
        });
    });

    // Handle detail page "Add to cart"
    const addToCartDetail = document.getElementById('addToCartDetail');
    if (addToCartDetail) {
        addToCartDetail.addEventListener('click', function (e) {
            e.preventDefault();
            const qtyInput = document.querySelector('.quantity-selector .qty-input');
            const product = {
                id: addToCartDetail.getAttribute('data-id'),
                name: addToCartDetail.getAttribute('data-name'),
                price: parseInt(addToCartDetail.getAttribute('data-price')),
                image: addToCartDetail.getAttribute('data-image'),
                category: addToCartDetail.getAttribute('data-category') || '',
                quantity: qtyInput ? parseInt(qtyInput.value) : 1
            };
            DGENCart.addItem(product);
        });
    }

    // Handle detail page "Buy Now"
    const buyNowBtnDetail = document.getElementById('buyNowBtnDetail');
    if (buyNowBtnDetail && addToCartDetail) {
        buyNowBtnDetail.addEventListener('click', function (e) {
            e.preventDefault();
            // Simulate add to cart
            const qtyInput = document.querySelector('.quantity-selector .qty-input');
            const product = {
                id: addToCartDetail.getAttribute('data-id'),
                name: addToCartDetail.getAttribute('data-name'),
                price: parseInt(addToCartDetail.getAttribute('data-price')),
                image: addToCartDetail.getAttribute('data-image'),
                category: addToCartDetail.getAttribute('data-category') || '',
                quantity: qtyInput ? parseInt(qtyInput.value) : 1
            };
            
            // Add item to cart without showing toast
            let cart = JSON.parse(localStorage.getItem(DGENCart.cartKey)) || [];
            const existingItem = cart.find(item => item.id === product.id && item.name === product.name);
            if (existingItem) {
                existingItem.quantity += product.quantity;
            } else {
                cart.push(product);
            }
            localStorage.setItem(DGENCart.cartKey, JSON.stringify(cart));
            
            // Redirect to checkout directly for "Buy Now"
            window.location.href = '?action=checkout';
        });
    }
});
