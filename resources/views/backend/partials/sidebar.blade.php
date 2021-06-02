<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
         </li>
            @if(auth()->user()->role == 'superAdmin')
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.list')}}">
              <span data-feather="users"></span>
              Users
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('expenses.list')}}">
              <span data-feather="layers"></span>
              Expenses
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('expensesCategory.list')}}">
              <span data-feather="layers"></span>
              Expenses Category
            </a>
          </li>

            @endif



          <li class="nav-item">
            <a class="nav-link" href="{{route('customer.list')}}">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{route('item.list')}}">
              <span data-feather="shopping-cart"></span>
              Items
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('invoice.list')}}">
              <span data-feather="file"></span>
              Invoices
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('payment.list')}}">
              <span data-feather="bar-chart-2"></span>
              Payments
            </a>
          </li>
        </ul>



      </div>
    </nav>
