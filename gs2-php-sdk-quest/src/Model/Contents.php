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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;

/**
 * コンテンツ
 *
 * @author Game Server Services, Inc.
 *
 */
class Contents implements IModel {
	/**
     * @var string クエストモデルのメタデータ
	 */
	protected $metadata;

	/**
	 * クエストモデルのメタデータを取得
	 *
	 * @return string|null クエストモデルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * クエストモデルのメタデータを設定
	 *
	 * @param string|null $metadata クエストモデルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * クエストモデルのメタデータを設定
	 *
	 * @param string|null $metadata クエストモデルのメタデータ
	 * @return Contents $this
	 */
	public function withMetadata(?string $metadata): Contents {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var AcquireAction[] クエストクリア時の報酬
	 */
	protected $completeAcquireActions;

	/**
	 * クエストクリア時の報酬を取得
	 *
	 * @return AcquireAction[]|null クエストクリア時の報酬
	 */
	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}

	/**
	 * クエストクリア時の報酬を設定
	 *
	 * @param AcquireAction[]|null $completeAcquireActions クエストクリア時の報酬
	 */
	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}

	/**
	 * クエストクリア時の報酬を設定
	 *
	 * @param AcquireAction[]|null $completeAcquireActions クエストクリア時の報酬
	 * @return Contents $this
	 */
	public function withCompleteAcquireActions(?array $completeAcquireActions): Contents {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}
	/**
     * @var int 抽選する重み
	 */
	protected $weight;

	/**
	 * 抽選する重みを取得
	 *
	 * @return int|null 抽選する重み
	 */
	public function getWeight(): ?int {
		return $this->weight;
	}

	/**
	 * 抽選する重みを設定
	 *
	 * @param int|null $weight 抽選する重み
	 */
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}

	/**
	 * 抽選する重みを設定
	 *
	 * @param int|null $weight 抽選する重み
	 * @return Contents $this
	 */
	public function withWeight(?int $weight): Contents {
		$this->weight = $weight;
		return $this;
	}

    public function toJson(): array {
        return array(
            "metadata" => $this->metadata,
            "completeAcquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->completeAcquireActions == null ? [] : $this->completeAcquireActions
            ),
            "weight" => $this->weight,
        );
    }

    public static function fromJson(array $data): Contents {
        $model = new Contents();
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setCompleteAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["completeAcquireActions"]) ? $data["completeAcquireActions"] : []
            )
        );
        $model->setWeight(isset($data["weight"]) ? $data["weight"] : null);
        return $model;
    }
}