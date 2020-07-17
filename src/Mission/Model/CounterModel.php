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
 * カウンターの種類
 *
 * @author Game Server Services, Inc.
 *
 */
class CounterModel implements IModel {
	/**
     * @var string カウンターの種類
	 */
	protected $counterId;

	/**
	 * カウンターの種類を取得
	 *
	 * @return string|null カウンターの種類
	 */
	public function getCounterId(): ?string {
		return $this->counterId;
	}

	/**
	 * カウンターの種類を設定
	 *
	 * @param string|null $counterId カウンターの種類
	 */
	public function setCounterId(?string $counterId) {
		$this->counterId = $counterId;
	}

	/**
	 * カウンターの種類を設定
	 *
	 * @param string|null $counterId カウンターの種類
	 * @return CounterModel $this
	 */
	public function withCounterId(?string $counterId): CounterModel {
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
	 * @return CounterModel $this
	 */
	public function withName(?string $name): CounterModel {
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
	 * @return CounterModel $this
	 */
	public function withMetadata(?string $metadata): CounterModel {
		$this->metadata = $metadata;
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
	 * @return CounterModel $this
	 */
	public function withScopes(?array $scopes): CounterModel {
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
	 * @return CounterModel $this
	 */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): CounterModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "counterId" => $this->counterId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "scopes" => array_map(
                function (CounterScopeModel $v) {
                    return $v->toJson();
                },
                $this->scopes == null ? [] : $this->scopes
            ),
            "challengePeriodEventId" => $this->challengePeriodEventId,
        );
    }

    public static function fromJson(array $data): CounterModel {
        $model = new CounterModel();
        $model->setCounterId(isset($data["counterId"]) ? $data["counterId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setScopes(array_map(
                function ($v) {
                    return CounterScopeModel::fromJson($v);
                },
                isset($data["scopes"]) ? $data["scopes"] : []
            )
        );
        $model->setChallengePeriodEventId(isset($data["challengePeriodEventId"]) ? $data["challengePeriodEventId"] : null);
        return $model;
    }
}