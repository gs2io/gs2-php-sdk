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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;

/**
 * カウンターの種類マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class CounterModelMaster implements IModel {
	/**
     * @var string カウンターの種類マスター
	 */
	protected $counterId;

	/**
	 * カウンターの種類マスターを取得
	 *
	 * @return string|null カウンターの種類マスター
	 */
	public function getCounterId(): ?string {
		return $this->counterId;
	}

	/**
	 * カウンターの種類マスターを設定
	 *
	 * @param string|null $counterId カウンターの種類マスター
	 */
	public function setCounterId(?string $counterId) {
		$this->counterId = $counterId;
	}

	/**
	 * カウンターの種類マスターを設定
	 *
	 * @param string|null $counterId カウンターの種類マスター
	 * @return CounterModelMaster $this
	 */
	public function withCounterId(?string $counterId): CounterModelMaster {
		$this->counterId = $counterId;
		return $this;
	}
	/**
     * @var string カウンター名
	 */
	protected $name;

	/**
	 * カウンター名を取得
	 *
	 * @return string|null カウンター名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string|null $name カウンター名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string|null $name カウンター名
	 * @return CounterModelMaster $this
	 */
	public function withName(?string $name): CounterModelMaster {
		$this->name = $name;
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
	 * @return CounterModelMaster $this
	 */
	public function withMetadata(?string $metadata): CounterModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string カウンターの種類マスターの説明
	 */
	protected $description;

	/**
	 * カウンターの種類マスターの説明を取得
	 *
	 * @return string|null カウンターの種類マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * カウンターの種類マスターの説明を設定
	 *
	 * @param string|null $description カウンターの種類マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * カウンターの種類マスターの説明を設定
	 *
	 * @param string|null $description カウンターの種類マスターの説明
	 * @return CounterModelMaster $this
	 */
	public function withDescription(?string $description): CounterModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var CounterScopeModel[] カウンターのリセットタイミング
	 */
	protected $scopes;

	/**
	 * カウンターのリセットタイミングを取得
	 *
	 * @return CounterScopeModel[]|null カウンターのリセットタイミング
	 */
	public function getScopes(): ?array {
		return $this->scopes;
	}

	/**
	 * カウンターのリセットタイミングを設定
	 *
	 * @param CounterScopeModel[]|null $scopes カウンターのリセットタイミング
	 */
	public function setScopes(?array $scopes) {
		$this->scopes = $scopes;
	}

	/**
	 * カウンターのリセットタイミングを設定
	 *
	 * @param CounterScopeModel[]|null $scopes カウンターのリセットタイミング
	 * @return CounterModelMaster $this
	 */
	public function withScopes(?array $scopes): CounterModelMaster {
		$this->scopes = $scopes;
		return $this;
	}
	/**
     * @var string カウントアップ可能な期間を指定するイベントマスター のGRN
	 */
	protected $challengePeriodEventId;

	/**
	 * カウントアップ可能な期間を指定するイベントマスター のGRNを取得
	 *
	 * @return string|null カウントアップ可能な期間を指定するイベントマスター のGRN
	 */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	/**
	 * カウントアップ可能な期間を指定するイベントマスター のGRNを設定
	 *
	 * @param string|null $challengePeriodEventId カウントアップ可能な期間を指定するイベントマスター のGRN
	 */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	/**
	 * カウントアップ可能な期間を指定するイベントマスター のGRNを設定
	 *
	 * @param string|null $challengePeriodEventId カウントアップ可能な期間を指定するイベントマスター のGRN
	 * @return CounterModelMaster $this
	 */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): CounterModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
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
	 * @return CounterModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): CounterModelMaster {
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
	 * @return CounterModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): CounterModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "counterId" => $this->counterId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "scopes" => array_map(
                function (CounterScopeModel $v) {
                    return $v->toJson();
                },
                $this->scopes == null ? [] : $this->scopes
            ),
            "challengePeriodEventId" => $this->challengePeriodEventId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): CounterModelMaster {
        $model = new CounterModelMaster();
        $model->setCounterId(isset($data["counterId"]) ? $data["counterId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setScopes(array_map(
                function ($v) {
                    return CounterScopeModel::fromJson($v);
                },
                isset($data["scopes"]) ? $data["scopes"] : []
            )
        );
        $model->setChallengePeriodEventId(isset($data["challengePeriodEventId"]) ? $data["challengePeriodEventId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}