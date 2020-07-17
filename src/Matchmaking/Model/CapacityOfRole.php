<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;

/**
 * ロールごとのキャパシティ
 *
 * @author Game Server Services, Inc.
 *
 */
class CapacityOfRole implements IModel {
	/**
     * @var string ロール名
	 */
	protected $roleName;

	/**
	 * ロール名を取得
	 *
	 * @return string|null ロール名
	 */
	public function getRoleName(): ?string {
		return $this->roleName;
	}

	/**
	 * ロール名を設定
	 *
	 * @param string|null $roleName ロール名
	 */
	public function setRoleName(?string $roleName) {
		$this->roleName = $roleName;
	}

	/**
	 * ロール名を設定
	 *
	 * @param string|null $roleName ロール名
	 * @return CapacityOfRole $this
	 */
	public function withRoleName(?string $roleName): CapacityOfRole {
		$this->roleName = $roleName;
		return $this;
	}
	/**
     * @var string[] ロール名の別名リスト
	 */
	protected $roleAliases;

	/**
	 * ロール名の別名リストを取得
	 *
	 * @return string[]|null ロール名の別名リスト
	 */
	public function getRoleAliases(): ?array {
		return $this->roleAliases;
	}

	/**
	 * ロール名の別名リストを設定
	 *
	 * @param string[]|null $roleAliases ロール名の別名リスト
	 */
	public function setRoleAliases(?array $roleAliases) {
		$this->roleAliases = $roleAliases;
	}

	/**
	 * ロール名の別名リストを設定
	 *
	 * @param string[]|null $roleAliases ロール名の別名リスト
	 * @return CapacityOfRole $this
	 */
	public function withRoleAliases(?array $roleAliases): CapacityOfRole {
		$this->roleAliases = $roleAliases;
		return $this;
	}
	/**
     * @var int 募集人数
	 */
	protected $capacity;

	/**
	 * 募集人数を取得
	 *
	 * @return int|null 募集人数
	 */
	public function getCapacity(): ?int {
		return $this->capacity;
	}

	/**
	 * 募集人数を設定
	 *
	 * @param int|null $capacity 募集人数
	 */
	public function setCapacity(?int $capacity) {
		$this->capacity = $capacity;
	}

	/**
	 * 募集人数を設定
	 *
	 * @param int|null $capacity 募集人数
	 * @return CapacityOfRole $this
	 */
	public function withCapacity(?int $capacity): CapacityOfRole {
		$this->capacity = $capacity;
		return $this;
	}
	/**
     * @var Player[] 参加者のプレイヤー情報リスト
	 */
	protected $participants;

	/**
	 * 参加者のプレイヤー情報リストを取得
	 *
	 * @return Player[]|null 参加者のプレイヤー情報リスト
	 */
	public function getParticipants(): ?array {
		return $this->participants;
	}

	/**
	 * 参加者のプレイヤー情報リストを設定
	 *
	 * @param Player[]|null $participants 参加者のプレイヤー情報リスト
	 */
	public function setParticipants(?array $participants) {
		$this->participants = $participants;
	}

	/**
	 * 参加者のプレイヤー情報リストを設定
	 *
	 * @param Player[]|null $participants 参加者のプレイヤー情報リスト
	 * @return CapacityOfRole $this
	 */
	public function withParticipants(?array $participants): CapacityOfRole {
		$this->participants = $participants;
		return $this;
	}

    public function toJson(): array {
        return array(
            "roleName" => $this->roleName,
            "roleAliases" => $this->roleAliases,
            "capacity" => $this->capacity,
            "participants" => array_map(
                function (Player $v) {
                    return $v->toJson();
                },
                $this->participants == null ? [] : $this->participants
            ),
        );
    }

    public static function fromJson(array $data): CapacityOfRole {
        $model = new CapacityOfRole();
        $model->setRoleName(isset($data["roleName"]) ? $data["roleName"] : null);
        $model->setRoleAliases(isset($data["roleAliases"]) ? $data["roleAliases"] : null);
        $model->setCapacity(isset($data["capacity"]) ? $data["capacity"] : null);
        $model->setParticipants(array_map(
                function ($v) {
                    return Player::fromJson($v);
                },
                isset($data["participants"]) ? $data["participants"] : []
            )
        );
        return $model;
    }
}