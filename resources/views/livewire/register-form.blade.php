<div class="card overflow-hidden m-0">
        <div class="row justify-content-center g-0" wire:key="register-form" data-step="{{ $step }}">
            <div class="col-lg-6">
                <div class="p-lg-5 p-4 auth-one-bg-small h-100">
                    <div class="bg-overlay"></div>
                    <div class="position-relative h-100 d-flex flex-column">
                        <div class="mb-4 text-center">
                            <img class="mb-1" src="{{ URL::asset('build/images/google.png') }}" alt="Google API" height="70">
                            <h5 class="mb-2">Google API verified</h5>
                            <h2>More than a free trial</h2>
                            <h2 class="col--grad-green">An opportunity for better traffic</h2>
                            <h5 class="mt-3 fs-14 fw-medium">We help you block fake clicks, bots, and invalid traffic. And we're ready to show you the data for all this with automated reports. All set up and ready to 🚀 in minutes.</h5>
                            <h5 class="mt-4">Easy Installation, No developer needed</h5>
                        </div>
                        <div class="mt-auto">
                            <div class="mb-3">
                                <i class="ri-double-quotes-l display-5 text-success"></i>
                            </div>

                            <div id="qoutescarouselIndicators" class="carousel slide"
                                data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner text-center text-black-50 pb-5">
                                    <div class="carousel-item active" wire:ignore.self>
                                        <p class="fs-15 fst-italic">"Just copy and paste a few lines of code into your website."</p>
                                    </div>
                                    <div class="carousel-item" wire:ignore.self>
                                        <p class="fs-15 fst-italic">"Just copy and paste a few lines of code into your website."</p>
                                    </div>
                                    <div class="carousel-item" wire:ignore.self>
                                        <p class="fs-15 fst-italic">"Just copy and paste a few lines of code into your website."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 tab-content">
                <!-- Step 1: Account Information -->
                <div class="tab-pane fade @if($step == 1)show active @endif" id="steparrow-gen-info" role="tabpanel">
                    <div>
                        <div class="p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Get your free account</h5>
                                <p class="text-muted mb-1">Install in minutes and start blocking fraud today.</p>
                            </div>
                            <div class="p-2">
                                <div class="mb-3">
                                    <label for="website" class="form-label">Website to Protect</label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" wire:model.lazy="website" placeholder="example.com" required autofocus="autofocus">
                                    @error('website')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model.lazy="email" placeholder="protext@example.com" required>
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="password-input" class="form-label">Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-1">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-input" wire:model.lazy="password" required>
                                        <button style="right: 4%!important;" class="btn btn-link position-absolute end-50 top-0 text-decoration-none text-muted" type="button" id="password-addon">
                                            <i class="ri-eye-fill align-middle"></i>
                                        </button>
                                        @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-0 fs-12 text-muted fst-italic">Your password must be at least 8 characters. We recommend at least 1 lowercase, 1 uppercase, and 1 number.</p>
                                </div>

                                <div class="mt-4">
                                    <div class="hstack gap-2 justify-content-between">
                                        <div class="hstack flex-wrap gap-2 w-100">
                                            <button type="button" class="btn btn-success btn-load w-100" wire:click="firstStepSubmit" wire:loading.attr="disabled">
                                                <span wire:loading wire:target="firstStepSubmit" class="d-flex align-items-center">
                                                    <span wire:loading wire:target="firstStepSubmit" class="spinner-border flex-shrink-0" style="margin-right: 6px" role="status">
                                                        <span wire:loading wire:target="firstStepSubmit" class="visually-hidden">Next</span>
                                                    </span>
                                                    <span class="flex-grow-1" wire:loading wire:target="firstStepSubmit">Processing</span>
                                                    <span class="flex-grow-1" wire:loading.remove wire:target="firstStepSubmit">Next</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @if(config('auth.social_login'))
                                    <div class="mt-3 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title text-muted">{{ __('auth.register_create_account_with') }}</h5>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-primary btn-icon waves-effect waves-light">
                                                <i class="ri-facebook-fill fs-16"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light">
                                                <i class="ri-google-fill fs-16"></i>
                                            </button>
                                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light">
                                                <i class="ri-github-fill fs-16"></i>
                                            </button>
                                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light">
                                                <i class="ri-twitter-fill fs-16"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-2 text-center">
                            <p class="mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Sign in</a></p>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Subscription -->
                <div class="tab-pane fade @if($step == 2)show active @endif" id="steparrow-description-info" role="tabpanel">
                    <div>
                        <div class="p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">{{ __('auth.register_subscription') }}</h5>
                                <p class="text-muted mb-1">{{ __('auth.register_subscription_message') }}</p>
                            </div>
                            <div class="p-2">
                                @if($selected_plan)
                                    <div class="mb-3">
                                        <div class="card mb-1">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    {{ $selected_plan->title ?? '' }} {{ __('plan.title') }}
                                                    @if($selected_plan->title && str_contains(strtolower($selected_plan->title), 'professional'))
                                                        <span class="badge badge-gradient-primary ms-2">{{ __('global.popular') }}</span>
                                                    @endif
                                                </h4>
                                                <p class="card-text text-muted">
                                                    @if($selected_plan->title && str_contains(strtolower($selected_plan->title), 'basic'))
                                                        {{ __("global.basic_plan_subtitle") }}
                                                    @elseif($selected_plan->title && str_contains(strtolower($selected_plan->title), 'professional'))
                                                        {{ __("global.pro_plan_subtitle") }}
                                                    @elseif($selected_plan->title && str_contains(strtolower($selected_plan->title), 'enterprise'))
                                                        {{ __("global.enterprise_plan_subtitle") }}
                                                    @else
                                                        {{ __("global.basic_plan_subtitle") }}
                                                    @endif
                                                </p>

                                                @if(isset($selected_plan->features) && $selected_plan->features)
                                                    @php
                                                        $adClicksFeature = $selected_plan->features->where('name', 'ad-clicks')->first();
                                                        $domainsFeature = $selected_plan->features->where('name', 'domains')->first();
                                                    @endphp

                                                    @if($adClicksFeature)
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-checkbox-circle-fill text-primary"></i>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2 text-muted">
                                                                Up to <span class="fw-bold text-primary">{{ number_format($adClicksFeature->charges ?? 0) }}</span> Ad Clicks
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if($domainsFeature)
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-checkbox-circle-fill text-primary"></i>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2 text-muted">
                                                                <span class="fw-bold text-primary">{{ number_format($domainsFeature->charges ?? 0) }}</span>
                                                                {{ __('plan.website') }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif

                                                <button type="button" class="btn btn-soft-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#plan-modal">
                                                    {{ __("global.change_plan") }}
                                                </button>

                                                <!-- Additional Plan Features -->
                                                <div class="mt-4 pt-3 border-top">
                                                    <div class="row g-3">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-shield-check-line text-success fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block">{{ __('plan.monitoring_and_blocking') }}</small>
                                                                    <span class="fw-semibold fs-13">{{ __('plan.device_fingerprinting') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-time-line text-info fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block">{{ __('global.setup') }}</small>
                                                                    <span class="fw-semibold fs-13">{{ __('global.instant_activation') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-shield-user-line text-warning fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block">{{ __('plan.detection') }}</small>
                                                                    <span class="fw-semibold fs-13">{{ __('plan.vpn_and_proxy_blocking') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-google-fill text-primary fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block">{{ __('plan.automated') }}</small>
                                                                    <span class="fw-semibold fs-13">{{ __('plan.automated_google_ads_blocking') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Plan Summary -->
                                                <div class="mt-3 p-3 bg-light rounded">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <div class="fw-bold fs-16 text-success">{{ __('global.14_day') }} {{ __('global.free_trial') }}</div>
                                                            <small class="text-muted">{{ __('auth.register_payment_title_message') }}</small>
                                                            <div class="mt-2">
                                                                <div class="fw-bold fs-20">€{{ $selected_plan->price ?? 0 }}
                                                                    <small class="text-muted">/{{ $payment_term === 'year' ? __('global.year') : __('global.month') }}</small>
                                                                    @if($payment_term === 'year')
                                                                        <span class="badge bg-dark ms-2">{{ __('global.save_20_percent') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <div class="hstack gap-2 justify-content-between">
                                        <div class="hstack flex-wrap gap-2 w-100">
                                            <button type="button" class="btn btn-success btn-load w-100" wire:click="secondStepSubmit" wire:loading.attr="disabled">
                                                <span wire:loading wire:target="secondStepSubmit" class="d-flex align-items-center">
                                                    <span wire:loading wire:target="secondStepSubmit" class="spinner-border flex-shrink-0" style="margin-right: 6px" role="status">
                                                        <span wire:loading wire:target="secondStepSubmit" class="visually-hidden">{{ __('global.next') }}</span>
                                                    </span>
                                                    <span class="flex-grow-1" wire:loading wire:target="secondStepSubmit">{{ __('auth.processing') }}</span>
                                                    <span class="flex-grow-1" wire:loading.remove wire:target="secondStepSubmit">{{ __('global.next') }}</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
