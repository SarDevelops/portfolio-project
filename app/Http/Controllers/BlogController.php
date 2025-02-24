<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get(); // Fetch all blogs ordered by latest

        return Inertia::render('Blogs/Index', [
            'blogs' => $blogs, // Pass blogs as a prop to the Vue component
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlogRequest $request)
    {
        // dd($request->all());
        return DB::transaction(function () use ($request) {
            $data = $request->validated();

            // Create a temporary blog record to get the ID
            $blog       = Blog::create($data);
            $blog->slug = Str::slug($data['slug']) . '-' . $blog->id; // Append ID to slug
            $blog->save();                                            // Save the updated slug

            // Handle Image Upload
            if ($request->hasFile('image')) {
                $timestamp = Carbon::now()->timestamp;
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = "blog_{$blog->id}_{$timestamp}.{$extension}";

                // Store the file
                $path        = $request->file('image')->storeAs('blogs', $imageName, 'public');
                $blog->image = $path;
                $blog->save(); // Save the image path
            }
            return back()->with('success', 'Blog Successfully Created', ['name' => $blog->title]);

            // return response()->json([
            //     'message' => 'Blog created successfully!',
            //     'blog'    => $blog,
            // ], 201);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->json($blog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        dd($request->all());
        return DB::transaction(function () use ($request, $blog) {
            $data = $request->validated();

            // Handle Image Upload (Delete Old Image)
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($blog->image) {
                    Storage::disk('public')->delete($blog->image);
                }

                $timestamp = Carbon::now()->timestamp;
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = "blog_{$blog->id}_{$timestamp}.{$extension}";

                // Store the new file
                $path          = $request->file('image')->storeAs('blogs', $imageName, 'public');
                $data['image'] = $path;
            }

            // Update slug with blog ID
            $data['slug'] = Str::slug($data['slug']) . '-' . $blog->id;

            // Update blog
            $blog->update($data);

            return response()->json([
                'message' => 'Blog updated successfully!',
                'blog'    => $blog,
            ], 200);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}