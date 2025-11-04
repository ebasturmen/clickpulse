<div class="p-2 mt-4">
    <form wire:submit.prevent="login">
        <div class="mb-3">
            <label for="email" class="form-label">@lang('translation.email') <span class="text-danger">*</span></label>
            <input
                type="text"
                class="form-control @error('email') is-invalid @enderror"
                wire:model="email"
                id="email"
                name="email"
                placeholder="@lang('translation.enter-email')"
            >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <div class="float-end">
                <a href="{{ route('password.update') }}" class="text-muted">@lang('translation.forgot-password')</a>
            </div>
            <label class="form-label" for="password-input">@lang('translation.password') <span class="text-danger">*</span></label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input
                    type="password"
                    class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                    wire:model="password"
                    placeholder="@lang('translation.enter-password')"
                    id="password-input"
                >
                <button
                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button"
                    id="password-addon"
                >
                    <i class="ri-eye-fill align-middle"></i>
                </button>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                wire:model="remember"
                id="auth-remember-check"
            >
            <label class="form-check-label" for="auth-remember-check">@lang('translation.remember-me')</label>
        </div>

        <div class="mt-4">
            <button class="btn btn-success w-100" type="submit" wire:loading.attr="disabled">
                <span wire:loading.remove>@lang('translation.sign-in')</span>
                <span wire:loading>@lang('translation.signing-in')...</span>
            </button>
        </div>

        @if($showSocialLogin)
            <div class="mt-4 text-center">
                <div class="signin-other-title">
                    <h5 class="fs-13 mb-4 title">@lang('translation.sign-in-with')</h5>
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
    </form>
</div>

