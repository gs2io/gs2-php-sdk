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
 * None
 *
 * @author Game Server Services, Inc.
 *
 */
class QuestModel implements IModel {
	/**
     * @var string クエストモデル
	 */
	protected $questModelId;

	/**
	 * クエストモデルを取得
	 *
	 * @return string|null クエストモデル
	 */
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}

	/**
	 * クエストモデルを設定
	 *
	 * @param string|null $questModelId クエストモデル
	 */
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}

	/**
	 * クエストモデルを設定
	 *
	 * @param string|null $questModelId クエストモデル
	 * @return QuestModel $this
	 */
	public function withQuestModelId(?string $questModelId): QuestModel {
		$this->questModelId = $questModelId;
		return $this;
	}
	/**
     * @var string クエストモデル名
	 */
	protected $name;

	/**
	 * クエストモデル名を取得
	 *
	 * @return string|null クエストモデル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * クエストモデル名を設定
	 *
	 * @param string|null $name クエストモデル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * クエストモデル名を設定
	 *
	 * @param string|null $name クエストモデル名
	 * @return QuestModel $this
	 */
	public function withName(?string $name): QuestModel {
		$this->name = $name;
		return $this;
	}
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
	 * @return QuestModel $this
	 */
	public function withMetadata(?string $metadata): QuestModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var Contents[] クエストの内容
	 */
	protected $contents;

	/**
	 * クエストの内容を取得
	 *
	 * @return Contents[]|null クエストの内容
	 */
	public function getContents(): ?array {
		return $this->contents;
	}

	/**
	 * クエストの内容を設定
	 *
	 * @param Contents[]|null $contents クエストの内容
	 */
	public function setContents(?array $contents) {
		$this->contents = $contents;
	}

	/**
	 * クエストの内容を設定
	 *
	 * @param Contents[]|null $contents クエストの内容
	 * @return QuestModel $this
	 */
	public function withContents(?array $contents): QuestModel {
		$this->contents = $contents;
		return $this;
	}
	/**
     * @var string 挑戦可能な期間を指定するイベントマスター のGRN
	 */
	protected $challengePeriodEventId;

	/**
	 * 挑戦可能な期間を指定するイベントマスター のGRNを取得
	 *
	 * @return string|null 挑戦可能な期間を指定するイベントマスター のGRN
	 */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	/**
	 * 挑戦可能な期間を指定するイベントマスター のGRNを設定
	 *
	 * @param string|null $challengePeriodEventId 挑戦可能な期間を指定するイベントマスター のGRN
	 */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	/**
	 * 挑戦可能な期間を指定するイベントマスター のGRNを設定
	 *
	 * @param string|null $challengePeriodEventId 挑戦可能な期間を指定するイベントマスター のGRN
	 * @return QuestModel $this
	 */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
	/**
     * @var ConsumeAction[] クエストの参加料
	 */
	protected $consumeActions;

	/**
	 * クエストの参加料を取得
	 *
	 * @return ConsumeAction[]|null クエストの参加料
	 */
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}

	/**
	 * クエストの参加料を設定
	 *
	 * @param ConsumeAction[]|null $consumeActions クエストの参加料
	 */
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}

	/**
	 * クエストの参加料を設定
	 *
	 * @param ConsumeAction[]|null $consumeActions クエストの参加料
	 * @return QuestModel $this
	 */
	public function withConsumeActions(?array $consumeActions): QuestModel {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	/**
     * @var AcquireAction[] クエスト失敗時の報酬
	 */
	protected $failedAcquireActions;

	/**
	 * クエスト失敗時の報酬を取得
	 *
	 * @return AcquireAction[]|null クエスト失敗時の報酬
	 */
	public function getFailedAcquireActions(): ?array {
		return $this->failedAcquireActions;
	}

	/**
	 * クエスト失敗時の報酬を設定
	 *
	 * @param AcquireAction[]|null $failedAcquireActions クエスト失敗時の報酬
	 */
	public function setFailedAcquireActions(?array $failedAcquireActions) {
		$this->failedAcquireActions = $failedAcquireActions;
	}

	/**
	 * クエスト失敗時の報酬を設定
	 *
	 * @param AcquireAction[]|null $failedAcquireActions クエスト失敗時の報酬
	 * @return QuestModel $this
	 */
	public function withFailedAcquireActions(?array $failedAcquireActions): QuestModel {
		$this->failedAcquireActions = $failedAcquireActions;
		return $this;
	}
	/**
     * @var string[] クエストに挑戦するためにクリアしておく必要のあるクエスト名
	 */
	protected $premiseQuestNames;

	/**
	 * クエストに挑戦するためにクリアしておく必要のあるクエスト名を取得
	 *
	 * @return string[]|null クエストに挑戦するためにクリアしておく必要のあるクエスト名
	 */
	public function getPremiseQuestNames(): ?array {
		return $this->premiseQuestNames;
	}

	/**
	 * クエストに挑戦するためにクリアしておく必要のあるクエスト名を設定
	 *
	 * @param string[]|null $premiseQuestNames クエストに挑戦するためにクリアしておく必要のあるクエスト名
	 */
	public function setPremiseQuestNames(?array $premiseQuestNames) {
		$this->premiseQuestNames = $premiseQuestNames;
	}

	/**
	 * クエストに挑戦するためにクリアしておく必要のあるクエスト名を設定
	 *
	 * @param string[]|null $premiseQuestNames クエストに挑戦するためにクリアしておく必要のあるクエスト名
	 * @return QuestModel $this
	 */
	public function withPremiseQuestNames(?array $premiseQuestNames): QuestModel {
		$this->premiseQuestNames = $premiseQuestNames;
		return $this;
	}

    public function toJson(): array {
        return array(
            "questModelId" => $this->questModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "contents" => array_map(
                function (Contents $v) {
                    return $v->toJson();
                },
                $this->contents == null ? [] : $this->contents
            ),
            "challengePeriodEventId" => $this->challengePeriodEventId,
            "consumeActions" => array_map(
                function (ConsumeAction $v) {
                    return $v->toJson();
                },
                $this->consumeActions == null ? [] : $this->consumeActions
            ),
            "failedAcquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->failedAcquireActions == null ? [] : $this->failedAcquireActions
            ),
            "premiseQuestNames" => $this->premiseQuestNames,
        );
    }

    public static function fromJson(array $data): QuestModel {
        $model = new QuestModel();
        $model->setQuestModelId(isset($data["questModelId"]) ? $data["questModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setContents(array_map(
                function ($v) {
                    return Contents::fromJson($v);
                },
                isset($data["contents"]) ? $data["contents"] : []
            )
        );
        $model->setChallengePeriodEventId(isset($data["challengePeriodEventId"]) ? $data["challengePeriodEventId"] : null);
        $model->setConsumeActions(array_map(
                function ($v) {
                    return ConsumeAction::fromJson($v);
                },
                isset($data["consumeActions"]) ? $data["consumeActions"] : []
            )
        );
        $model->setFailedAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["failedAcquireActions"]) ? $data["failedAcquireActions"] : []
            )
        );
        $model->setPremiseQuestNames(isset($data["premiseQuestNames"]) ? $data["premiseQuestNames"] : null);
        return $model;
    }
}