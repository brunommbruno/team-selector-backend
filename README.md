# Restful API: Team Selector

- [Matches](#matches)
  - [GET all matches](#get-all-matches)
  - [POST a match](#post-a-match)
  - [DELETE a match](#delete-a-specific-match)
- [Team](#team)
  - [GET all teams](#get-all-teams)
  - [GET teams participating in a match](#get-teams-participating-in-a-match)
  - [GET a specific team](#get-a-specifc-team)
  - [POST a team](#post-a-team)
  - [PATCH a team](#patch-a-team)
  - [DELETE a team](#delete-a-team)
- [Player](#player)
  - [GET all players](#get-all-players)
  - [GET players in a team](#get-players-in-a-team)
  - [GET a specific player](#get-a-specific-player)
  - [POST a player](#post-a-player)
  - [PATCH a player](#patch-a-player)
  - [DELETE a player](#delete-a-player)

Base Url: `localhost:8000`

# Matches
## GET all matches
To GET all the matches available use:
`/matches`

This will return:
- id
<br><br>

## POST a match
To POST a match use:
`/matches`

<i>no inputs required</i>
<br><br>

## DELETE a specific match
To DELETE a specific match use:
`/matches/{match_id}`

This will return:
- 204 (if successfully deleted)
<br><br><br>

# Team
## GET all teams
To GET all the teams available use:
`/teams` 

This will return:
[{
 - id
 - team_name
 - team_color
 - team_kit
 - score
 - match_id
}]
<br><br>

## GET teams participating in a match
To GET both teams participating in a match use:
`/matches/{match_id}/teams`

This will return:
[{
 - id
 - team_name
 - team_color
 - team_kit
 - score
 - match_id
}]
<br><br>

## GET a specific team
To GET a specific team use:
`/teams/{team_id}`

This will return: 
- id
- team_name
- team_color
- team_kit
- score
- match_id
<br><br>

## POST a team
To POST a team use:
`/matches/{match_id}/teams`

Inputs required:
- team_name
- team_color
- team_kit
- score
<br><br>

## PATCH a team
To PATCH a team use:
`/team/{team_id}`

Inputs allowed:
- team_name
- team_color
- team_kit
- score
<br><br>

## DELETE a team
To DELETE a team use:
`/team/{team_id}`

This will return:
- 204 (if successfully deleted)
<br><br><br>

# Player
## GET all players
To GET all the players available use:
`/players`

This will return:
[{
   - id
   - player_name
   - player_skill
   - player_position
   - team_id
}]
<br><br>

## GET players in a team
To GET all players in a team use:
`/teams/{team_id}/players`

This will return:
[{
   - id
   - player_name
   - player_skill
   - player_position
   - team_id
}]
<br><br>

## GET a specific player
To GET a specific player use:
`/players/{player_id}`

This will return:
[{
   - id
   - player_name
   - player_skill
   - player_position
   - team_id
}]
<br><br>

## POST a player
To POST a player use:
`/team/{team_id}/players`

Inputs required:
- player_name
- player_skill
- player_position
<br><br>

## PATCH a player
To PATCH a player use:
`/players/{player_id}`

Inputs allowed:
- player_name
- player_skill
- player_position
<br><br>

## DELETE a player
To DELETE a player use:
`/players/{player_id}`

This will return:
- 204 (if successfully deleted)
<br><br><br>
