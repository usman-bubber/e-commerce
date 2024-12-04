<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>

<!-- Header Section -->
<div class="faq-header">
    <h2 class="fw-bold text-muted">Frequently Asked Questions</h2>
    <p class="text-muted">We're here to help with any questions you have about plans, pricing, and supported features.</p>
    <input type="text" id="faqSearch" class="form-control search-bar border-rounded" placeholder="Search ...">
</div>

<!-- FAQ Content -->
<div class="container-fluid p-5">
    <div class="row gy-4" id="faqContainer">
        <!-- General Section -->
        <div class="col-lg-6">
            <div class="faq-section">
                <h5>General</h5>
                <div class="accordion" id="generalAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="generalOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseGeneralOne" aria-expanded="true">
                                How do I create an account on your store?
                            </button>
                        </h2>
                        <div id="collapseGeneralOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                To create an account, simply click on the "Sign Up" button at the top right corner of our website, enter your details, and follow the prompts to complete your registration.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="generalTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseGeneralTwo">
                                Can I modify my order after placing it?
                            </button>
                        </h2>
                        <div id="collapseGeneralTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Unfortunately, once an order is placed, we cannot modify it. However, you can cancel the order within a short window and place a new one.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="generalThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseGeneralThree">
                                Do you offer international shipping?
                            </button>
                        </h2>
                        <div id="collapseGeneralThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Yes, we offer international shipping to several countries. Please check our shipping policy page for a full list of countries we deliver to.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="generalFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseGeneralFour">
                                What should I do if my order is missing an item?
                            </button>
                        </h2>
                        <div id="collapseGeneralFour" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                If an item is missing from your order, please contact our customer support team as soon as possible. We will investigate and resolve the issue promptly.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Section -->
        <div class="col-lg-6">
            <div class="faq-section">
                <h5>Payments</h5>
                <div class="accordion" id="paymentAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="paymentOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePaymentOne">
                                How can I pay for my order?
                            </button>
                        </h2>
                        <div id="collapsePaymentOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                We accept all major credit and debit cards, PayPal, and other secure payment methods. Select your preferred payment method during checkout.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="paymentTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePaymentTwo">
                                Is my payment information secure?
                            </button>
                        </h2>
                        <div id="collapsePaymentTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Yes, all payments are processed securely using industry-standard encryption to ensure that your personal and payment details are protected.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="paymentThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePaymentThree">
                                Do you offer payment plans or installments?
                            </button>
                        </h2>
                        <div id="collapsePaymentThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                We currently do not offer installment plans, but we do offer a variety of payment options. Please check our payment methods page for more details.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="paymentFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePaymentFour">
                                Will I be charged sales tax on my order?
                            </button>
                        </h2>
                        <div id="collapsePaymentFour" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Sales tax is applied based on your location and local tax regulations. The tax amount will be displayed during checkout.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extraScript') ?>
<script>
    document.getElementById('faqSearch').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const faqItems = document.querySelectorAll('.accordion-item');

        faqItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(query) ? '' : 'none';
        });
    });
</script>
<?= $this->endSection() ?>
