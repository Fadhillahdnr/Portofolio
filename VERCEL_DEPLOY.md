# Deploy ke Vercel

1. Import repository di Vercel dan pilih preset **Other**.
2. Gunakan build command `npm run build` dan kosongkan Output Directory.
3. Salin isi `.env.vercel.example` ke **Settings > Environment Variables** untuk Production, Preview, dan Development bila diperlukan.
4. Ganti `YOUR-PROJECT` pada `APP_URL` dan `ASSET_URL` dengan domain Vercel yang sebenarnya.
5. Deploy. Database Supabase sudah memiliki seluruh migration Laravel.

## Batasan upload

Vercel Functions tidak menyediakan filesystem permanen. Implementasi upload lokal project ini tidak cocok untuk production di Vercel: file baru dapat hilang atau gagal ditulis. Gunakan Supabase Storage, Cloudinary, atau object storage lain sebelum memakai fitur upload admin di production.
