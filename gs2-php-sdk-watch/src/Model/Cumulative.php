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

namespace Gs2\Watch\Model;

use Gs2\Core\Model\IModel;

/**
 * 累積値
 *
 * @author Game Server Services, Inc.
 *
 */
class Cumulative implements IModel {
	/**
     * @var string 累積値
	 */
	protected $cumulativeId;

	/**
	 * 累積値を取得
	 *
	 * @return string|null 累積値
	 */
	public function getCumulativeId(): ?string {
		return $this->cumulativeId;
	}

	/**
	 * 累積値を設定
	 *
	 * @param string|null $cumulativeId 累積値
	 */
	public function setCumulativeId(?string $cumulativeId) {
		$this->cumulativeId = $cumulativeId;
	}

	/**
	 * 累積値を設定
	 *
	 * @param string|null $cumulativeId 累積値
	 * @return Cumulative $this
	 */
	public function withCumulativeId(?string $cumulativeId): Cumulative {
		$this->cumulativeId = $cumulativeId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Cumulative $this
	 */
	public function withOwnerId(?string $ownerId): Cumulative {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string リソースのGRN
	 */
	protected $resourceGrn;

	/**
	 * リソースのGRNを取得
	 *
	 * @return string|null リソースのGRN
	 */
	public function getResourceGrn(): ?string {
		return $this->resourceGrn;
	}

	/**
	 * リソースのGRNを設定
	 *
	 * @param string|null $resourceGrn リソースのGRN
	 */
	public function setResourceGrn(?string $resourceGrn) {
		$this->resourceGrn = $resourceGrn;
	}

	/**
	 * リソースのGRNを設定
	 *
	 * @param string|null $resourceGrn リソースのGRN
	 * @return Cumulative $this
	 */
	public function withResourceGrn(?string $resourceGrn): Cumulative {
		$this->resourceGrn = $resourceGrn;
		return $this;
	}
	/**
     * @var string 名前
	 */
	protected $name;

	/**
	 * 名前を取得
	 *
	 * @return string|null 名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $name 名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $name 名前
	 * @return Cumulative $this
	 */
	public function withName(?string $name): Cumulative {
		$this->name = $name;
		return $this;
	}
	/**
     * @var int 累積値
	 */
	protected $value;

	/**
	 * 累積値を取得
	 *
	 * @return int|null 累積値
	 */
	public function getValue(): ?int {
		return $this->value;
	}

	/**
	 * 累積値を設定
	 *
	 * @param int|null $value 累積値
	 */
	public function setValue(?int $value) {
		$this->value = $value;
	}

	/**
	 * 累積値を設定
	 *
	 * @param int|null $value 累積値
	 * @return Cumulative $this
	 */
	public function withValue(?int $value): Cumulative {
		$this->value = $value;
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
	 * @return Cumulative $this
	 */
	public function withUpdatedAt(?int $updatedAt): Cumulative {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "cumulativeId" => $this->cumulativeId,
            "ownerId" => $this->ownerId,
            "resourceGrn" => $this->resourceGrn,
            "name" => $this->name,
            "value" => $this->value,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Cumulative {
        $model = new Cumulative();
        $model->setCumulativeId(isset($data["cumulativeId"]) ? $data["cumulativeId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setResourceGrn(isset($data["resourceGrn"]) ? $data["resourceGrn"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}