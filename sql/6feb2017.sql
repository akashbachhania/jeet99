ALTER TABLE `audio_song` ADD `song_name_auth` VARCHAR(100) NULL AFTER `song_name`;
ALTER TABLE `audio_song` ADD `video_name` VARCHAR(100) NOT NULL ;
ALTER TABLE `audio_song` ADD `video_name_auth` VARCHAR(100) NULL AFTER `video_name`;
