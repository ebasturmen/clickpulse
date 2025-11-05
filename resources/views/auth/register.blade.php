@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.signup')
@endsection
@section('content')

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="80">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">@lang('translation.register-subtitle')</p>
                        </div>

                        <div class="row d-flex">
                            <div class="col-6 ms-auto">
                                <div class="step-arrow-nav mb-4" id="step-navigation">
                                    <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link step-nav-item" data-step="1">
                                                @lang('translation.register-step-my-account')
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link step-nav-item" data-step="2">
                                                @lang('translation.register-step-subscription')
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link step-nav-item" data-step="3">
                                                @lang('translation.register-step-payment-information')
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-3">
                                @livewire('language-selector')
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @livewire('register-form')
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Velzon. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function updateStepNavigation(step) {
            document.querySelectorAll('.step-nav-item').forEach(function(item) {
                if (parseInt(item.getAttribute('data-step')) === step) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        // Livewire event listener
        document.addEventListener('livewire:init', () => {
            let stripe, elements, cardElement;
            const stripeKey = '{{ config("services.stripe.key", env("STRIPE_KEY")) }}';

            Livewire.on('step-updated', (data) => {
                updateStepNavigation(data.step);

                if (data.step === 3 && !cardElement && stripeKey) {
                    initializeStripe();
                }
            });

            // Component her güncellendiğinde step'i kontrol et
            Livewire.hook('morph.updated', ({ component, el }) => {
                if (component && component.fingerprint && component.fingerprint.name === 'register-form') {
                    const stepElement = el.querySelector('[data-step]');
                    if (stepElement) {
                        const step = parseInt(stepElement.getAttribute('data-step'));
                        updateStepNavigation(step);

                        if (step === 3 && !cardElement && stripeKey) {
                            setTimeout(() => initializeStripe(), 100);
                        }
                    }
                }
            });

            function initializeStripe() {
                if (!stripeKey) {
                    console.error('Stripe key not found');
                    return;
                }

                stripe = Stripe(stripeKey);
                elements = stripe.elements();

                const cardElementContainer = document.getElementById('card-element');
                if (!cardElementContainer) return;

                // Clear existing element if any
                if (cardElement) {
                    cardElement.unmount();
                }

                cardElement = elements.create('card', {
                    style: {
                        base: {
                            fontSize: '16px',
                            color: '#424770',
                            '::placeholder': {
                                color: '#aab7c4',
                            },
                        },
                        invalid: {
                            color: '#9e2146',
                        },
                    },
                });

                cardElement.mount('#card-element');

                cardElement.on('change', function(event) {
                    if (event.error) {
                        const component = Livewire.find('register-form');
                        if (component) {
                            component.set('payment_method_id', '');
                        }
                    }
                });

                // Handle finish button click
                const finishButton = document.getElementById('finish-button');
                if (finishButton) {
                    finishButton.addEventListener('click', async function(e) {
                        e.preventDefault();

                        if (!cardElement) return;

                        const { paymentMethod, error } = await stripe.createPaymentMethod({
                            type: 'card',
                            card: cardElement,
                        });

                        const component = Livewire.find('register-form');
                        if (!component) return;

                        if (error) {
                            component.set('payment_method_id', '');
                            component.addError('payment_method_id', error.message);
                        } else {
                            component.set('payment_method_id', paymentMethod.id);
                            component.call('finishRegistration');
                        }
                    });
                }
            }

            // Initialize on step 3 if already there
            setTimeout(function() {
                const registerForm = document.querySelector('[data-step]');
                if (registerForm) {
                    const step = parseInt(registerForm.getAttribute('data-step'));
                    updateStepNavigation(step);

                    if (step === 3 && stripeKey) {
                        setTimeout(() => initializeStripe(), 500);
                    }
                }
            }, 100);
        });
    </script>
@endsection
