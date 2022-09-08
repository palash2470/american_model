<div class="user-dashboard-lft my_acc_lft">
    <span class="acc_close">
        <button type="button">
            <i class="fas fa-times"></i>
        </button>
    </span>
    <div class="account-menu">
        <ul>
            <li class="{{ (request()->is('myaccount/account') ||  request()->is('myaccount/change-password')) ? 'open' : '' }}"><a href="javascript:;" class="icon-menu">general</a>
                <ul class="submenu">
                    <li><a href="{{route('user.account')}}" class="{{ request()->is('myaccount/account') ? 'active' : '' }}">account</a></li>
                    <li><a href="{{route('user.change_password')}}" class="{{request()->is('myaccount/change-password') ? 'active' : ''}}">change password</a></li>
                </ul>
            </li>
            <li class="{{ (request()->is('myaccount/display-options')) ? 'open' : '' }}"><a href="javascript:;" class="icon-menu">privecy</a>
                <ul class="submenu">
                    <li><a href="{{route('user.display_option')}}" class="{{ request()->is('myaccount/display-options') ? 'active' : '' }}">Display Options</a></li>
                    {{-- <li><a href="#">Blocked People</a></li> --}}
                </ul>
            </li>
            <li class="{{ (request()->is('myaccount/my-membership') || request()->is('myaccount/my-billing')) ? 'open' : '' }}"><a href="javascript:;" class="icon-menu">membership</a>
                <ul class="submenu">
                    <li><a href="{{route('user.my_membership')}}" class="{{ request()->is('myaccount/my-membership') ? 'active' : '' }}">My Membership</a></li>
                    <li><a href="{{route('user.my_billing')}}" class="{{ request()->is('myaccount/my-billing') ? 'active' : '' }}">My Billing</a></li>
                </ul>
            </li>
            <li><a href="javascript:;" class="icon-menu">subscription</a>
                <ul class="submenu">
                    <li><a href="#" class="">My Subscriptions</a></li>
                    <li><a href="#">My Subscribers</a></li>
                </ul>
            </li>
            {{-- <li><a href="javascript:;" class="icon-menu">preferences</a>
                <ul class="submenu">
                    <li><a href="#" class="">account</a></li>
                    <li><a href="#">change password</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>