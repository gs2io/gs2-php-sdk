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
 * クエストグループ
 *
 * @author Game Server Services, Inc.
 *
 */
class QuestGroupModel implements IModel {
	/**
     * @var string クエストグループ
	 */
	protected $questGroupModelId;

	/**
	 * クエストグループを取得
	 *
	 * @return string|null クエストグループ
	 */
	public function getQuestGroupModelId(): ?string {
		return $this->questGroupModelId;
	}

	/**
	 * クエストグループを設定
	 *
	 * @param string|null $questGroupModelId クエストグループ
	 */
	public function setQuestGroupModelId(?string $questGroupModelId) {
		$this->questGroupModelId = $questGroupModelId;
	}

	/**
	 * クエストグループを設定
	 *
	 * @param string|null $questGroupModelId クエストグループ
	 * @return QuestGroupModel $this
	 */
	public function withQuestGroupModelId(?string $questGroupModelId): QuestGroupModel {
		$this->questGroupModelId = $questGroupModelId;
		return $this;
	}
	/**
     * @var string クエストグループ名
	 */
	protected $name;

	/**
	 * クエストグループ名を取得
	 *
	 * @return string|null クエストグループ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * クエストグループ名を設定
	 *
	 * @param string|null $name クエストグループ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * クエストグループ名を設定
	 *
	 * @param string|null $name クエストグループ名
	 * @return QuestGroupModel $this
	 */
	public function withName(?string $name): QuestGroupModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string クエストグループのメタデータ
	 */
	protected $metadata;

	/**
	 * クエストグループのメタデータを取得
	 *
	 * @return string|null クエストグループのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * クエストグループのメタデータを設定
	 *
	 * @param string|null $metadata クエストグループのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * クエストグループのメタデータを設定
	 *
	 * @param string|null $metadata クエストグループのメタデータ
	 * @return QuestGroupModel $this
	 */
	public function withMetadata(?string $metadata): QuestGroupModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var QuestModel[] グループに属するクエスト
	 */
	protected $quests;

	/**
	 * グループに属するクエストを取得
	 *
	 * @return QuestModel[]|null グループに属するクエスト
	 */
	public function getQuests(): ?array {
		return $this->quests;
	}

	/**
	 * グループに属するクエストを設定
	 *
	 * @param QuestModel[]|null $quests グループに属するクエスト
	 */
	public function setQuests(?array $quests) {
		$this->quests = $quests;
	}

	/**
	 * グループに属するクエストを設定
	 *
	 * @param QuestModel[]|null $quests グループに属するクエスト
	 * @return QuestGroupModel $this
	 */
	public function withQuests(?array $quests): QuestGroupModel {
		$this->quests = $quests;
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
	 * @return QuestGroupModel $this
	 */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestGroupModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "questGroupModelId" => $this->questGroupModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "quests" => array_map(
                function (QuestModel $v) {
                    return $v->toJson();
                },
                $this->quests == null ? [] : $this->quests
            ),
            "challengePeriodEventId" => $this->challengePeriodEventId,
        );
    }

    public static function fromJson(array $data): QuestGroupModel {
        $model = new QuestGroupModel();
        $model->setQuestGroupModelId(isset($data["questGroupModelId"]) ? $data["questGroupModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setQuests(array_map(
                function ($v) {
                    return QuestModel::fromJson($v);
                },
                isset($data["quests"]) ? $data["quests"] : []
            )
        );
        $model->setChallengePeriodEventId(isset($data["challengePeriodEventId"]) ? $data["challengePeriodEventId"] : null);
        return $model;
    }
}