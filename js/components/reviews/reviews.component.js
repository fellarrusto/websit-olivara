class ReviewComponent {
    constructor({imageSrc, name, date, reviewText}) {
        this.imageSrc = imageSrc;
        this.name = name;
        this.date = date;
        this.reviewText = reviewText;
    }

    render() {
        return `
            <div>
                <div class="box_overlay">
                    <div class="pic">
                        <figure><img src="${this.imageSrc}" alt="" class="img-circle"></figure>
                        <h4>${this.name}<small>${this.date}</small></h4>
                    </div>
                    <div class="comment">
                        "${this.reviewText}"
                    </div>
                </div>
                <!-- End box_overlay -->
            </div>
        `;
    }

    inject(targetElementSelector) {
        const targetElement = document.querySelector(targetElementSelector);
        if (targetElement) {
            targetElement.innerHTML += this.render();
        } else {
            console.error('Target element not found');
        }
    }
}
