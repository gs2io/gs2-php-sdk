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
 * Quest Group Model
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#questgroupmodel
 */
class QuestGroupModel implements IModel {
	/**
     * @var string Quest Group Model GRN
	 */
	private $questGroupModelId;
	/**
     * @var string Quest Group Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array Quests belonging to the group
	 */
	private $quests;
	/**
     * @var string Challenge Period Event GRN
	 */
	private $challengePeriodEventId;
    /** @return string|null Quest Group Model GRN */
	public function getQuestGroupModelId(): ?string {
		return $this->questGroupModelId;
	}
    /** @param string|null $questGroupModelId Quest Group Model GRN */
	public function setQuestGroupModelId(?string $questGroupModelId) {
		$this->questGroupModelId = $questGroupModelId;
	}
    /**
     * @param string|null $questGroupModelId Quest Group Model GRN
     * @return QuestGroupModel
     */
	public function withQuestGroupModelId(?string $questGroupModelId): QuestGroupModel {
		$this->questGroupModelId = $questGroupModelId;
		return $this;
	}
    /** @return string|null Quest Group Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Quest Group Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Quest Group Model name
     * @return QuestGroupModel
     */
	public function withName(?string $name): QuestGroupModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return QuestGroupModel
     */
	public function withMetadata(?string $metadata): QuestGroupModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null Quests belonging to the group */
	public function getQuests(): ?array {
		return $this->quests;
	}
    /** @param array|null $quests Quests belonging to the group */
	public function setQuests(?array $quests) {
		$this->quests = $quests;
	}
    /**
     * @param array|null $quests Quests belonging to the group
     * @return QuestGroupModel
     */
	public function withQuests(?array $quests): QuestGroupModel {
		$this->quests = $quests;
		return $this;
	}
    /** @return string|null Challenge Period Event GRN */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
    /** @param string|null $challengePeriodEventId Challenge Period Event GRN */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
    /**
     * @param string|null $challengePeriodEventId Challenge Period Event GRN
     * @return QuestGroupModel
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestGroupModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?QuestGroupModel {
        if ($data === null) {
            return null;
        }
        return (new QuestGroupModel())
            ->withQuestGroupModelId(array_key_exists('questGroupModelId', $data) && $data['questGroupModelId'] !== null ? $data['questGroupModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withQuests(!array_key_exists('quests', $data) || $data['quests'] === null ? null : array_map(
                function ($item) {
                    return QuestModel::fromJson($item);
                },
                $data['quests']
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "questGroupModelId" => $this->getQuestGroupModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "quests" => $this->getQuests() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getQuests()
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
        );
    }
}