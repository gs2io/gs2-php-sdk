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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;

/**
 * スロット
 *
 * @author Game Server Services, Inc.
 *
 */
class Slot implements IModel {
	/**
     * @var string スロットモデル名
	 */
	protected $name;

	/**
	 * スロットモデル名を取得
	 *
	 * @return string|null スロットモデル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * スロットモデル名を設定
	 *
	 * @param string|null $name スロットモデル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * スロットモデル名を設定
	 *
	 * @param string|null $name スロットモデル名
	 * @return Slot $this
	 */
	public function withName(?string $name): Slot {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string プロパティID
	 */
	protected $propertyId;

	/**
	 * プロパティIDを取得
	 *
	 * @return string|null プロパティID
	 */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	/**
	 * プロパティIDを設定
	 *
	 * @param string|null $propertyId プロパティID
	 */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	/**
	 * プロパティIDを設定
	 *
	 * @param string|null $propertyId プロパティID
	 * @return Slot $this
	 */
	public function withPropertyId(?string $propertyId): Slot {
		$this->propertyId = $propertyId;
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
	 * @return Slot $this
	 */
	public function withMetadata(?string $metadata): Slot {
		$this->metadata = $metadata;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
            "propertyId" => $this->propertyId,
            "metadata" => $this->metadata,
        );
    }

    public static function fromJson(array $data): Slot {
        $model = new Slot();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setPropertyId(isset($data["propertyId"]) ? $data["propertyId"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        return $model;
    }
}