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
 * クエストモデルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class QuestModelMaster implements IModel {
	/**
     * @var string クエストモデルマスター
	 */
	protected $questModelId;

	/**
	 * クエストモデルマスターを取得
	 *
	 * @return string|null クエストモデルマスター
	 */
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}

	/**
	 * クエストモデルマスターを設定
	 *
	 * @param string|null $questModelId クエストモデルマスター
	 */
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}

	/**
	 * クエストモデルマスターを設定
	 *
	 * @param string|null $questModelId クエストモデルマスター
	 * @return QuestModelMaster $this
	 */
	public function withQuestModelId(?string $questModelId): QuestModelMaster {
		$this->questModelId = $questModelId;
		return $this;
	}
	/**
     * @var string クエストモデル名
	 */
	protected $questGroupName;

	/**
	 * クエストモデル名を取得
	 *
	 * @return string|null クエストモデル名
	 */
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}

	/**
	 * クエストモデル名を設定
	 *
	 * @param string|null $questGroupName クエストモデル名
	 */
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}

	/**
	 * クエストモデル名を設定
	 *
	 * @param string|null $questGroupName クエストモデル名
	 * @return QuestModelMaster $this
	 */
	public function withQuestGroupName(?string $questGroupName): QuestModelMaster {
		$this->questGroupName = $questGroupName;
		return $this;
	}
	/**
     * @var string クエスト名
	 */
	protected $name;

	/**
	 * クエスト名を取得
	 *
	 * @return string|null クエスト名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * クエスト名を設定
	 *
	 * @param string|null $name クエスト名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * クエスト名を設定
	 *
	 * @param string|null $name クエスト名
	 * @return QuestModelMaster $this
	 */
	public function withName(?string $name): QuestModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string クエストモデルの説明
	 */
	protected $description;

	/**
	 * クエストモデルの説明を取得
	 *
	 * @return string|null クエストモデルの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * クエストモデルの説明を設定
	 *
	 * @param string|null $description クエストモデルの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * クエストモデルの説明を設定
	 *
	 * @param string|null $description クエストモデルの説明
	 * @return QuestModelMaster $this
	 */
	public function withDescription(?string $description): QuestModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string クエストのメタデータ
	 */
	protected $metadata;

	/**
	 * クエストのメタデータを取得
	 *
	 * @return string|null クエストのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * クエストのメタデータを設定
	 *
	 * @param string|null $metadata クエストのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * クエストのメタデータを設定
	 *
	 * @param string|null $metadata クエストのメタデータ
	 * @return QuestModelMaster $this
	 */
	public function withMetadata(?string $metadata): QuestModelMaster {
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
	 * @return QuestModelMaster $this
	 */
	public function withContents(?array $contents): QuestModelMaster {
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
	 * @return QuestModelMaster $this
	 */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestModelMaster {
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
	 * @return QuestModelMaster $this
	 */
	public function withConsumeActions(?array $consumeActions): QuestModelMaster {
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
	 * @return QuestModelMaster $this
	 */
	public function withFailedAcquireActions(?array $failedAcquireActions): QuestModelMaster {
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
	 * @return QuestModelMaster $this
	 */
	public function withPremiseQuestNames(?array $premiseQuestNames): QuestModelMaster {
		$this->premiseQuestNames = $premiseQuestNames;
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
	 * @return QuestModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): QuestModelMaster {
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
	 * @return QuestModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): QuestModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "questModelId" => $this->questModelId,
            "questGroupName" => $this->questGroupName,
            "name" => $this->name,
            "description" => $this->description,
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
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): QuestModelMaster {
        $model = new QuestModelMaster();
        $model->setQuestModelId(isset($data["questModelId"]) ? $data["questModelId"] : null);
        $model->setQuestGroupName(isset($data["questGroupName"]) ? $data["questGroupName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
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
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}