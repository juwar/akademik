<?php

namespace app\models;

use app\models\Mahasiswa;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $nama;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $role;


    const ROLE_ADMIN = 10;
    const ROLE_MODERATOR = 20;
    const ROLE_USER = 30;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
            'role' => 10,
        ],
        '102' => [
            'id' => '102',
            'username' => 'dosen',
            'password' => 'dosen',
            'authKey' => 'test101key',
            'accessToken' => '102-token',
            'role' => 20,
        ],
        '103' => [
            'id' => '103',
            'username' => 'mahasiswa',
            'password' => 'mahasiswa',
            'authKey' => 'test103key',
            'accessToken' => '103-token',
            'role' => 30,
        ],
    ];

    public static function getUsers(): array
    {
        $query = Mahasiswa::find()->all();
        $list = [
            '100' => [
                'id' => '100',
                'username' => 'admin',
                'password' => 'admin',
                'authKey' => 'test100key',
                'accessToken' => '100-token',
                'role' => 10,
            ],
            '102' => [
                'id' => '102',
                'username' => 'dosen',
                'password' => 'dosen',
                'authKey' => 'test101key',
                'accessToken' => '102-token',
                'role' => 20,
            ],
        ];
        foreach ($query as $row) {
            $list[$row['nim']] = [
                'id' => $row['nim'],
                'nama' => $row['nama'],
                'username' => $row['nim'],
                'password' => $row['nim'],
                'authKey' => $row['nim'],
                'accessToken' => $row['nim'],
                'role' => 30,
            ];
        }
        // echo '<pre>';
        // print_r($list);
        // exit;
        // die;
        return $list;
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::getUsers()[$id]) ? new static(self::getUsers()[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::getUsers() as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::getUsers() as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}