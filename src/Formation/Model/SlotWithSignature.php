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
 * 署名付きスロット
 *
 * @author Game Server Services, Inc.
 *
 */
class SlotWithSignature implements IModel {
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
	 * @return SlotWithSignature $this
	 */
	public function withName(?string $name): SlotWithSignature {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string プロパティの種類
	 */
	protected $propertyType;

	/**
	 * プロパティの種類を取得
	 *
	 * @return string|null プロパティの種類
	 */
	public function getPropertyType(): ?string {
		return $this->propertyType;
	}

	/**
	 * プロパティの種類を設定
	 *
	 * @param string|null $propertyType プロパティの種類
	 */
	public function setPropertyType(?string $propertyType) {
		$this->propertyType = $propertyType;
	}

	/**
	 * プロパティの種類を設定
	 *
	 * @param string|null $propertyType プロパティの種類
	 * @return SlotWithSignature $this
	 */
	public function withPropertyType(?string $propertyType): SlotWithSignature {
		$this->propertyType = $propertyType;
		return $this;
	}
	/**
     * @var string ペイロード
	 */
	protected $body;

	/**
	 * ペイロードを取得
	 *
	 * @return string|null ペイロード
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * ペイロードを設定
	 *
	 * @param string|null $body ペイロード
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * ペイロードを設定
	 *
	 * @param string|null $body ペイロード
	 * @return SlotWithSignature $this
	 */
	public function withBody(?string $body): SlotWithSignature {
		$this->body = $body;
		return $this;
	}
	/**
     * @var string プロパティIDのリソースを所有していることを証明する署名
	 */
	protected $signature;

	/**
	 * プロパティIDのリソースを所有していることを証明する署名を取得
	 *
	 * @return string|null プロパティIDのリソースを所有していることを証明する署名
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * プロパティIDのリソースを所有していることを証明する署名を設定
	 *
	 * @param string|null $signature プロパティIDのリソースを所有していることを証明する署名
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	/**
	 * プロパティIDのリソースを所有していることを証明する署名を設定
	 *
	 * @param string|null $signature プロパティIDのリソースを所有していることを証明する署名
	 * @return SlotWithSignature $this
	 */
	public function withSignature(?string $signature): SlotWithSignature {
		$this->signature = $signature;
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
	 * @return SlotWithSignature $this
	 */
	public function withMetadata(?string $metadata): SlotWithSignature {
		$this->metadata = $metadata;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
            "propertyType" => $this->propertyType,
            "body" => $this->body,
            "signature" => $this->signature,
            "metadata" => $this->metadata,
        );
    }

    public static function fromJson(array $data): SlotWithSignature {
        $model = new SlotWithSignature();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setPropertyType(isset($data["propertyType"]) ? $data["propertyType"] : null);
        $model->setBody(isset($data["body"]) ? $data["body"] : null);
        $model->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        return $model;
    }
}