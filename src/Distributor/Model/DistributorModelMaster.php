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

namespace Gs2\Distributor\Model;

use Gs2\Core\Model\IModel;

/**
 * 配信設定マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class DistributorModelMaster implements IModel {
	/**
     * @var string 配信設定マスター
	 */
	protected $distributorModelId;

	/**
	 * 配信設定マスターを取得
	 *
	 * @return string|null 配信設定マスター
	 */
	public function getDistributorModelId(): ?string {
		return $this->distributorModelId;
	}

	/**
	 * 配信設定マスターを設定
	 *
	 * @param string|null $distributorModelId 配信設定マスター
	 */
	public function setDistributorModelId(?string $distributorModelId) {
		$this->distributorModelId = $distributorModelId;
	}

	/**
	 * 配信設定マスターを設定
	 *
	 * @param string|null $distributorModelId 配信設定マスター
	 * @return DistributorModelMaster $this
	 */
	public function withDistributorModelId(?string $distributorModelId): DistributorModelMaster {
		$this->distributorModelId = $distributorModelId;
		return $this;
	}
	/**
     * @var string 配信設定名
	 */
	protected $name;

	/**
	 * 配信設定名を取得
	 *
	 * @return string|null 配信設定名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 配信設定名を設定
	 *
	 * @param string|null $name 配信設定名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 配信設定名を設定
	 *
	 * @param string|null $name 配信設定名
	 * @return DistributorModelMaster $this
	 */
	public function withName(?string $name): DistributorModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 配信設定マスターの説明
	 */
	protected $description;

	/**
	 * 配信設定マスターの説明を取得
	 *
	 * @return string|null 配信設定マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 配信設定マスターの説明を設定
	 *
	 * @param string|null $description 配信設定マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 配信設定マスターの説明を設定
	 *
	 * @param string|null $description 配信設定マスターの説明
	 * @return DistributorModelMaster $this
	 */
	public function withDescription(?string $description): DistributorModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 配信設定のメタデータ
	 */
	protected $metadata;

	/**
	 * 配信設定のメタデータを取得
	 *
	 * @return string|null 配信設定のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 配信設定のメタデータを設定
	 *
	 * @param string|null $metadata 配信設定のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 配信設定のメタデータを設定
	 *
	 * @param string|null $metadata 配信設定のメタデータ
	 * @return DistributorModelMaster $this
	 */
	public function withMetadata(?string $metadata): DistributorModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRN
	 */
	protected $inboxNamespaceId;

	/**
	 * 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRNを取得
	 *
	 * @return string|null 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRN
	 */
	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}

	/**
	 * 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRNを設定
	 *
	 * @param string|null $inboxNamespaceId 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRN
	 */
	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}

	/**
	 * 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRNを設定
	 *
	 * @param string|null $inboxNamespaceId 所持品がキャパシティをオーバーしたときに転送するプレゼントボックスのネームスペース のGRN
	 * @return DistributorModelMaster $this
	 */
	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributorModelMaster {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}
	/**
     * @var string[] ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリスト
	 */
	protected $whiteListTargetIds;

	/**
	 * ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリストを取得
	 *
	 * @return string[]|null ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリスト
	 */
	public function getWhiteListTargetIds(): ?array {
		return $this->whiteListTargetIds;
	}

	/**
	 * ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリストを設定
	 *
	 * @param string[]|null $whiteListTargetIds ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリスト
	 */
	public function setWhiteListTargetIds(?array $whiteListTargetIds) {
		$this->whiteListTargetIds = $whiteListTargetIds;
	}

	/**
	 * ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリストを設定
	 *
	 * @param string[]|null $whiteListTargetIds ディストリビューターを通して処理出来る対象のリソースGRNのホワイトリスト
	 * @return DistributorModelMaster $this
	 */
	public function withWhiteListTargetIds(?array $whiteListTargetIds): DistributorModelMaster {
		$this->whiteListTargetIds = $whiteListTargetIds;
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
	 * @return DistributorModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): DistributorModelMaster {
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
	 * @return DistributorModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): DistributorModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "distributorModelId" => $this->distributorModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "inboxNamespaceId" => $this->inboxNamespaceId,
            "whiteListTargetIds" => $this->whiteListTargetIds,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): DistributorModelMaster {
        $model = new DistributorModelMaster();
        $model->setDistributorModelId(isset($data["distributorModelId"]) ? $data["distributorModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setInboxNamespaceId(isset($data["inboxNamespaceId"]) ? $data["inboxNamespaceId"] : null);
        $model->setWhiteListTargetIds(isset($data["whiteListTargetIds"]) ? $data["whiteListTargetIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}