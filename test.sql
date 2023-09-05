SELECT U.id user_id, U.pseudo, U.email, U.avatar, M.id m_id, M.content, M.created_at
FROM users U,
     microposts M,
     friends_relationships F
WHERE M.user_id = U.id
  AND CASE
          WHEN F.user_id1 = :user_id
              THEN F.user_id2 = M.user_id
          WHEN F.user_id2 = :user_id
              THEN F.user_id1 = M.user_id
    END
  AND F.status > 0

ORDER BY M.created_at DESC

-- Juste un commentaire:
-- :user_id sera remplacé par $_GET['id']