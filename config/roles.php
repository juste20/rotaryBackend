<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mapping des rôles Rotary / Rotaract
    |--------------------------------------------------------------------------
    | Définition claire des rôles avec priorités et regroupements.
    | Ces rôles sont utilisés pour le contrôle d’accès (middleware RoleMiddleware).
    |--------------------------------------------------------------------------
    */

    'roles' => [

        // Super Admin
        'super_admin' => [
            'name' => 'Super-Administrateur',
            'description' => 'Accès complet à tous les modules (Speed-Tech / Club)',
            'priority' => 100,
        ],

        // Bureau exécutif
        'president' => [
            'name' => 'Président',
            'description' => 'Supervision générale du club et gestion des actions.',
            'priority' => 90,
        ],
        'vice_president' => [
            'name' => 'Vice-Président',
            'description' => 'Adjoint au président pour la coordination.',
            'priority' => 80,
        ],

        // Secrétariat
        'secretary' => [
            'name' => 'Secrétaire',
            'description' => 'Gestion des réunions, documents et correspondances.',
            'priority' => 70,
        ],
        'assistant_secretary' => [
            'name' => 'Secrétaire adjoint',
            'description' => 'Assistance au secrétaire.',
            'priority' => 60,
        ],

        // Trésorerie
        'treasurer' => [
            'name' => 'Trésorier',
            'description' => 'Gestion des cotisations et finances.',
            'priority' => 70,
        ],
        'assistant_treasurer' => [
            'name' => 'Trésorier adjoint',
            'description' => 'Assistance au trésorier.',
            'priority' => 60,
        ],

        // Protocole
        'protocol_chief' => [
            'name' => 'Chef de Protocole',
            'description' => 'Organisation des réunions et présence des membres.',
            'priority' => 60,
        ],
        'assistant_protocol' => [
            'name' => 'Chef de Protocole adjoint',
            'description' => 'Soutien au protocole et logistique.',
            'priority' => 50,
        ],

        // Commissions
        'commission_president' => [
            'name' => 'Président de Commission',
            'description' => 'Responsable d’un axe ou projet spécifique.',
            'priority' => 50,
        ],
        'commission_vice_president' => [
            'name' => 'Vice-Président de Commission',
            'description' => 'Adjoint du président de commission.',
            'priority' => 45,
        ],

        // Historique et membres
        'past_president' => [
            'name' => 'Past Président',
            'description' => 'Ancien président, rôle consultatif.',
            'priority' => 40,
        ],
        'member' => [
            'name' => 'Membre simple',
            'description' => 'Membre actif du club sans fonction spécifique.',
            'priority' => 10,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Règles générales
    |--------------------------------------------------------------------------
    */

    'default_role' => 'member',

    'role_hierarchy' => [
        'super_admin' => ['president', 'treasurer', 'secretary', 'protocol_chief', 'commission_president', 'member'],
        'president' => ['vice_president', 'treasurer', 'secretary', 'protocol_chief', 'member'],
        'treasurer' => ['assistant_treasurer'],
        'secretary' => ['assistant_secretary'],
        'protocol_chief' => ['assistant_protocol'],
    ],
];
