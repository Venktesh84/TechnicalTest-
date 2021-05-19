<?php declare(strict_types=1);

namespace IconLanguageServices\SoftwareEngineerTechnicalTest2021\Part2;

class Solution
{
    /**
     * Return an SQL statement (SELECT ...) to retrieve
     * a row for each song with the artist's name and the song title
     *
     * e.g.
     *   The Beatles, Yellow Submarine
     *   Nirvana, Smells Like Teen Spirit
     *   Rick Astley, Never Gonna Give You Up
     *
     * @return string
     */
    public function artistAndSongTitleSQL(): string
    {
        return <<<SQL
            -- Put your SQL statement here
        SELECT name, title FROM artists inner join 
        songs on artists.id = songs.artist_id
        order by artists.name desc ;
        SQL;
    }
    /**
     * Return an SQL statement (SELECT ...) to retrieve
     * each artist that works in MULTIPLE genres along
     * with the count of how many genres they work in
     *
     * e.g.
     *   The Beatles, 3
     *   The Beach Boys, 2
     *
     * @return string
     */
    public function artistsWithMultipleGenresSQL(): string
    {
        return <<<SQL
            -- Put your SQL statement here
        SELECT name,count( DISTINCT songs_genres.genre_id) as count FROM artists left join 
        songs on artists.id = songs.artist_id
        inner join songs_genres on songs_genres.song_id = songs.id
        group by artists.name 
        having(count > 1)
        order by artists.name desc ;
        SQL;
    }
}
