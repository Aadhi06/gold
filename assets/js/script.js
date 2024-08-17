document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Thank you for contacting us! We will get back to you soon.');
});

let slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    const slides = document.querySelectorAll('.slide');
    if (n >= slides.length) { slideIndex = 0; }
    if (n < 0) { slideIndex = slides.length - 1; }
    slides.forEach(slide => slide.classList.remove('active'));
    slides[slideIndex].classList.add('active');
}

// Auto slide functionality (optional)
setInterval(() => {
    plusSlides(1);
}, 3000); // Change image every 3 seconds

// Update Gold Prices

function updatePrices() {
    let totalAmount = 0;
    for (let key in prices) {
        const grams = parseFloat(document.getElementById('grams' + key).value) || 0;
        const amount = grams * pricePerGram * prices[key];
        document.getElementById('price' + key).textContent = amount.toFixed(2);
        totalAmount += amount;
    }
    document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
}

const pricePerOunce = 1812.14; // Admin-set price per ounce in GBP
const pricePerGram = pricePerOunce / 31.1035;

const gramsInputs = document.querySelectorAll('.metal-calculator-input');
const prices = {
    '9k': 9 / 24,
    '10k': 10 / 24,
    '12k': 12 / 24,
    '14k': 14 / 24,
    '15k': 15 / 24,
    '18k': 18 / 24,
    '21k': 21 / 24,
    '22k': 22 / 24,
    '22kc': 22 / 24,
    '24k': 24 / 24
};

gramsInputs.forEach(input => {
    input.addEventListener('input', updatePrices);
});

                

