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
 * プレイヤー情報
 *
 * @author Game Server Services, Inc.
 *
 */
class Player implements IModel {
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Player $this
	 */
	public function withUserId(?string $userId): Player {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var Attribute[] 属性値のリスト
	 */
	protected $attributes;

	/**
	 * 属性値のリストを取得
	 *
	 * @return Attribute[]|null 属性値のリスト
	 */
	public function getAttributes(): ?array {
		return $this->attributes;
	}

	/**
	 * 属性値のリストを設定
	 *
	 * @param Attribute[]|null $attributes 属性値のリスト
	 */
	public function setAttributes(?array $attributes) {
		$this->attributes = $attributes;
	}

	/**
	 * 属性値のリストを設定
	 *
	 * @param Attribute[]|null $attributes 属性値のリスト
	 * @return Player $this
	 */
	public function withAttributes(?array $attributes): Player {
		$this->attributes = $attributes;
		return $this;
	}
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
	 * @return Player $this
	 */
	public function withRoleName(?string $roleName): Player {
		$this->roleName = $roleName;
		return $this;
	}
	/**
     * @var string[] 参加を拒否するユーザIDリスト
	 */
	protected $denyUserIds;

	/**
	 * 参加を拒否するユーザIDリストを取得
	 *
	 * @return string[]|null 参加を拒否するユーザIDリスト
	 */
	public function getDenyUserIds(): ?array {
		return $this->denyUserIds;
	}

	/**
	 * 参加を拒否するユーザIDリストを設定
	 *
	 * @param string[]|null $denyUserIds 参加を拒否するユーザIDリスト
	 */
	public function setDenyUserIds(?array $denyUserIds) {
		$this->denyUserIds = $denyUserIds;
	}

	/**
	 * 参加を拒否するユーザIDリストを設定
	 *
	 * @param string[]|null $denyUserIds 参加を拒否するユーザIDリスト
	 * @return Player $this
	 */
	public function withDenyUserIds(?array $denyUserIds): Player {
		$this->denyUserIds = $denyUserIds;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "attributes" => array_map(
                function (Attribute $v) {
                    return $v->toJson();
                },
                $this->attributes == null ? [] : $this->attributes
            ),
            "roleName" => $this->roleName,
            "denyUserIds" => $this->denyUserIds,
        );
    }

    public static function fromJson(array $data): Player {
        $model = new Player();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setAttributes(array_map(
                function ($v) {
                    return Attribute::fromJson($v);
                },
                isset($data["attributes"]) ? $data["attributes"] : []
            )
        );
        $model->setRoleName(isset($data["roleName"]) ? $data["roleName"] : null);
        $model->setDenyUserIds(isset($data["denyUserIds"]) ? $data["denyUserIds"] : null);
        return $model;
    }
}