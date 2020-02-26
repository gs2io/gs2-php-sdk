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
 * クエストグループマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class QuestGroupModelMaster implements IModel {
	/**
     * @var string クエストグループマスター
	 */
	protected $questGroupModelId;

	/**
	 * クエストグループマスターを取得
	 *
	 * @return string|null クエストグループマスター
	 */
	public function getQuestGroupModelId(): ?string {
		return $this->questGroupModelId;
	}

	/**
	 * クエストグループマスターを設定
	 *
	 * @param string|null $questGroupModelId クエストグループマスター
	 */
	public function setQuestGroupModelId(?string $questGroupModelId) {
		$this->questGroupModelId = $questGroupModelId;
	}

	/**
	 * クエストグループマスターを設定
	 *
	 * @param string|null $questGroupModelId クエストグループマスター
	 * @return QuestGroupModelMaster $this
	 */
	public function withQuestGroupModelId(?string $questGroupModelId): QuestGroupModelMaster {
		$this->questGroupModelId = $questGroupModelId;
		return $this;
	}
	/**
     * @var string クエストグループモデル名
	 */
	protected $name;

	/**
	 * クエストグループモデル名を取得
	 *
	 * @return string|null クエストグループモデル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * クエストグループモデル名を設定
	 *
	 * @param string|null $name クエストグループモデル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * クエストグループモデル名を設定
	 *
	 * @param string|null $name クエストグループモデル名
	 * @return QuestGroupModelMaster $this
	 */
	public function withName(?string $name): QuestGroupModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string クエストグループマスターの説明
	 */
	protected $description;

	/**
	 * クエストグループマスターの説明を取得
	 *
	 * @return string|null クエストグループマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * クエストグループマスターの説明を設定
	 *
	 * @param string|null $description クエストグループマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * クエストグループマスターの説明を設定
	 *
	 * @param string|null $description クエストグループマスターの説明
	 * @return QuestGroupModelMaster $this
	 */
	public function withDescription(?string $description): QuestGroupModelMaster {
		$this->description = $description;
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
	 * @return QuestGroupModelMaster $this
	 */
	public function withMetadata(?string $metadata): QuestGroupModelMaster {
		$this->metadata = $metadata;
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
	 * @return QuestGroupModelMaster $this
	 */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestGroupModelMaster {
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
	 * @return QuestGroupModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): QuestGroupModelMaster {
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
	 * @return QuestGroupModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): QuestGroupModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "questGroupModelId" => $this->questGroupModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "challengePeriodEventId" => $this->challengePeriodEventId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): QuestGroupModelMaster {
        $model = new QuestGroupModelMaster();
        $model->setQuestGroupModelId(isset($data["questGroupModelId"]) ? $data["questGroupModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setChallengePeriodEventId(isset($data["challengePeriodEventId"]) ? $data["challengePeriodEventId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}