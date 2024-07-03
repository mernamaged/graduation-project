    <?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\ContractController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\EndProductController;
    use App\Http\Controllers\PackageController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\RawController;
    use App\Http\Controllers\SupplierController;
    use App\Http\Controllers\UserController;
    use App\Http\Middleware\RevalidateBackHistory;
    use App\Models\endProduct;
    use App\Models\rawMaterial;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Storage;
    use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

    use App\Http\Middleware\PreventBackHistory;

    //login and registration
    Route::get('/reg', [UserController::class, 'register'])->name('register');
    Route::POST('/reg', [UserController::class, 'registerPost'])->name('register');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::POST('/login', [UserController::class, 'loginPost'])->name('login');
    Route::delete('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/admin/create', [AdminController::class, 'create'])->name('admins.create');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admins.update');


    Route::resource('contracts', ContractController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('endProducts', EndProductController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('rawMaterials', RawController::class);
    Route::resource('suppliers', SupplierController::class);

    Route::post('/admin/store', [AdminController::class, 'store'])->name('admins.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
