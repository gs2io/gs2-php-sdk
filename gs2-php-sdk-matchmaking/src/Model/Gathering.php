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
 * ギャザリング
 *
 * @author Game Server Services, Inc.
 *
 */
class Gathering implements IModel {
	/**
     * @var string ギャザリング
	 */
	protected $gatheringId;

	/**
	 * ギャザリングを取得
	 *
	 * @return string|null ギャザリング
	 */
	public function getGatheringId(): ?string {
		return $this->gatheringId;
	}

	/**
	 * ギャザリングを設定
	 *
	 * @param string|null $gatheringId ギャザリング
	 */
	public function setGatheringId(?string $gatheringId) {
		$this->gatheringId = $gatheringId;
	}

	/**
	 * ギャザリングを設定
	 *
	 * @param string|null $gatheringId ギャザリング
	 * @return Gathering $this
	 */
	public function withGatheringId(?string $gatheringId): Gathering {
		$this->gatheringId = $gatheringId;
		return $this;
	}
	/**
     * @var string ギャザリング名
	 */
	protected $name;

	/**
	 * ギャザリング名を取得
	 *
	 * @return string|null ギャザリング名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ギャザリング名を設定
	 *
	 * @param string|null $name ギャザリング名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ギャザリング名を設定
	 *
	 * @param string|null $name ギャザリング名
	 * @return Gathering $this
	 */
	public function withName(?string $name): Gathering {
		$this->name = $name;
		return $this;
	}
	/**
     * @var AttributeRange[] 募集条件
	 */
	protected $attributeRanges;

	/**
	 * 募集条件を取得
	 *
	 * @return AttributeRange[]|null 募集条件
	 */
	public function getAttributeRanges(): ?array {
		return $this->attributeRanges;
	}

	/**
	 * 募集条件を設定
	 *
	 * @param AttributeRange[]|null $attributeRanges 募集条件
	 */
	public function setAttributeRanges(?array $attributeRanges) {
		$this->attributeRanges = $attributeRanges;
	}

	/**
	 * 募集条件を設定
	 *
	 * @param AttributeRange[]|null $attributeRanges 募集条件
	 * @return Gathering $this
	 */
	public function withAttributeRanges(?array $attributeRanges): Gathering {
		$this->attributeRanges = $attributeRanges;
		return $this;
	}
	/**
     * @var CapacityOfRole[] 参加者
	 */
	protected $capacityOfRoles;

	/**
	 * 参加者を取得
	 *
	 * @return CapacityOfRole[]|null 参加者
	 */
	public function getCapacityOfRoles(): ?array {
		return $this->capacityOfRoles;
	}

	/**
	 * 参加者を設定
	 *
	 * @param CapacityOfRole[]|null $capacityOfRoles 参加者
	 */
	public function setCapacityOfRoles(?array $capacityOfRoles) {
		$this->capacityOfRoles = $capacityOfRoles;
	}

	/**
	 * 参加者を設定
	 *
	 * @param CapacityOfRole[]|null $capacityOfRoles 参加者
	 * @return Gathering $this
	 */
	public function withCapacityOfRoles(?array $capacityOfRoles): Gathering {
		$this->capacityOfRoles = $capacityOfRoles;
		return $this;
	}
	/**
     * @var string[] 参加を許可するユーザIDリスト
	 */
	protected $allowUserIds;

	/**
	 * 参加を許可するユーザIDリストを取得
	 *
	 * @return string[]|null 参加を許可するユーザIDリスト
	 */
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}

	/**
	 * 参加を許可するユーザIDリストを設定
	 *
	 * @param string[]|null $allowUserIds 参加を許可するユーザIDリスト
	 */
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}

	/**
	 * 参加を許可するユーザIDリストを設定
	 *
	 * @param string[]|null $allowUserIds 参加を許可するユーザIDリスト
	 * @return Gathering $this
	 */
	public function withAllowUserIds(?array $allowUserIds): Gathering {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}
	/**
     * @var string メタデータ
	 */
	protected $metadata;

	/**
	 * メタデータを取得
	 *
	 * @return string|null メタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 * @return Gathering $this
	 */
	public function withMetadata(?string $metadata): Gathering {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Gathering $this
	 */
	public function withCreatedAt(?int $createdAt): Gathering {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Gathering $this
	 */
	public function withUpdatedAt(?int $updatedAt): Gathering {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "gatheringId" => $this->gatheringId,
            "name" => $this->name,
            "attributeRanges" => array_map(
                function (AttributeRange $v) {
                    return $v->toJson();
                },
                $this->attributeRanges == null ? [] : $this->attributeRanges
            ),
            "capacityOfRoles" => array_map(
                function (CapacityOfRole $v) {
                    return $v->toJson();
                },
                $this->capacityOfRoles == null ? [] : $this->capacityOfRoles
            ),
            "allowUserIds" => $this->allowUserIds,
            "metadata" => $this->metadata,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Gathering {
        $model = new Gathering();
        $model->setGatheringId(isset($data["gatheringId"]) ? $data["gatheringId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setAttributeRanges(array_map(
                function ($v) {
                    return AttributeRange::fromJson($v);
                },
                isset($data["attributeRanges"]) ? $data["attributeRanges"] : []
            )
        );
        $model->setCapacityOfRoles(array_map(
                function ($v) {
                    return CapacityOfRole::fromJson($v);
                },
                isset($data["capacityOfRoles"]) ? $data["capacityOfRoles"] : []
            )
        );
        $model->setAllowUserIds(isset($data["allowUserIds"]) ? $data["allowUserIds"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}