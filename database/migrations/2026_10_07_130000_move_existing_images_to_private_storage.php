<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        Product::query()
            ->where('image', 'like', 'PageContent/%')
            ->each(function (Product $product): void {
                $legacyPath = public_path($product->image);

                if (! is_file($legacyPath)) {
                    return;
                }

                $privatePath = 'page-content/' . basename($legacyPath);
                Storage::disk('local')->put($privatePath, file_get_contents($legacyPath));
                $product->update(['image' => $privatePath]);
                unlink($legacyPath);
            });
    }

    public function down(): void
    {
        // Private media should not be made public again during rollback.
    }
};
