/**
 * Toast error notifications with auto-dismiss and manual close.
 */
export function initToastErrors() {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toasts = container.querySelectorAll('.toast-item');
    const AUTO_DISMISS_MS = 5000;
    const STAGGER_MS = 300;

    function dismissToast(toast) {
        toast.style.animation = 'toast-fade-out 0.3s ease-in forwards';
        toast.addEventListener('animationend', () => {
            toast.remove();
            if (container.children.length === 0) {
                container.remove();
            }
        }, { once: true });
    }

    toasts.forEach((toast) => {
        const closeBtn = toast.querySelector('[data-toast-dismiss]');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => dismissToast(toast));
        }
    });

    toasts.forEach((toast, index) => {
        setTimeout(() => {
            if (toast.parentNode) {
                dismissToast(toast);
            }
        }, AUTO_DISMISS_MS + (index * STAGGER_MS));
    });
}
