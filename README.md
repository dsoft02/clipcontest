
# ClipContest

ClipContest is a video contest web application built with Laravel and MySQL. It allows users to participate in contests, upload videos, and vote for their favorite videos.

## Features

- Admin can create and manage contests
- Users can vote for their favorite videos
- Responsive design using Bootstrap
- Real-time updates and notifications

## Installation

1. Clone the repository:

   ```sh
   git clone https://github.com/dsoft02/clipcontest.git
   ```

2. Navigate to the project directory:

   ```sh
   cd clipcontest
   ```

3. Install dependencies:

   ```sh
   composer install
   npm install
   ```

4. Create a `.env` file and configure your environment variables:

   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

5. Run the database migrations and seeders:

   ```sh
   php artisan migrate --seed
   ```

6. Start the development server:

   ```sh
   php artisan serve
   npm run dev
   ```

## Usage

- Access the admin panel at `/admin` to manage contests and view voting results.
- Users can visit the `/contestants` page to view and vote for their favorite videos.

## Contributing

Feel free to contribute to this project by submitting issues or pull requests.

## License

This project is licensed under the MIT License.
