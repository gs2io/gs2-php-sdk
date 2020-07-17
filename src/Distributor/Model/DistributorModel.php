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
 * 配信設定
 *
 * @author Game Server Services, Inc.
 *
 */
class DistributorModel implements IModel {
	/**
     * @var string 配信設定
	 */
	protected $distributorModelId;

	/**
	 * 配信設定を取得
	 *
	 * @return string|null 配信設定
	 */
	public function getDistributorModelId(): ?string {
		return $this->distributorModelId;
	}

	/**
	 * 配信設定を設定
	 *
	 * @param string|null $distributorModelId 配信設定
	 */
	public function setDistributorModelId(?string $distributorModelId) {
		$this->distributorModelId = $distributorModelId;
	}

	/**
	 * 配信設定を設定
	 *
	 * @param string|null $distributorModelId 配信設定
	 * @return DistributorModel $this
	 */
	public function withDistributorModelId(?string $distributorModelId): DistributorModel {
		$this->distributorModelId = $distributorModelId;
		return $this;
	}
	/**
     * @var string ディストリビューターの種類名
	 */
	protected $name;

	/**
	 * ディストリビューターの種類名を取得
	 *
	 * @return string|null ディストリビューターの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ディストリビューターの種類名を設定
	 *
	 * @param string|null $name ディストリビューターの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ディストリビューターの種類名を設定
	 *
	 * @param string|null $name ディストリビューターの種類名
	 * @return DistributorModel $this
	 */
	public function withName(?string $name): DistributorModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ディストリビューターの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * ディストリビューターの種類のメタデータを取得
	 *
	 * @return string|null ディストリビューターの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * ディストリビューターの種類のメタデータを設定
	 *
	 * @param string|null $metadata ディストリビューターの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * ディストリビューターの種類のメタデータを設定
	 *
	 * @param string|null $metadata ディストリビューターの種類のメタデータ
	 * @return DistributorModel $this
	 */
	public function withMetadata(?string $metadata): DistributorModel {
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
	 * @return DistributorModel $this
	 */
	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributorModel {
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
	 * @return DistributorModel $this
	 */
	public function withWhiteListTargetIds(?array $whiteListTargetIds): DistributorModel {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}

    public function toJson(): array {
        return array(
            "distributorModelId" => $this->distributorModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "inboxNamespaceId" => $this->inboxNamespaceId,
            "whiteListTargetIds" => $this->whiteListTargetIds,
        );
    }

    public static function fromJson(array $data): DistributorModel {
        $model = new DistributorModel();
        $model->setDistributorModelId(isset($data["distributorModelId"]) ? $data["distributorModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setInboxNamespaceId(isset($data["inboxNamespaceId"]) ? $data["inboxNamespaceId"] : null);
        $model->setWhiteListTargetIds(isset($data["whiteListTargetIds"]) ? $data["whiteListTargetIds"] : null);
        return $model;
    }
}