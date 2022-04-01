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


class QuestGroupModel implements IModel {
	/**
     * @var string
	 */
	private $questGroupModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $quests;
	/**
     * @var string
	 */
	private $challengePeriodEventId;

	public function getQuestGroupModelId(): ?string {
		return $this->questGroupModelId;
	}

	public function setQuestGroupModelId(?string $questGroupModelId) {
		$this->questGroupModelId = $questGroupModelId;
	}

	public function withQuestGroupModelId(?string $questGroupModelId): QuestGroupModel {
		$this->questGroupModelId = $questGroupModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): QuestGroupModel {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): QuestGroupModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getQuests(): ?array {
		return $this->quests;
	}

	public function setQuests(?array $quests) {
		$this->quests = $quests;
	}

	public function withQuests(?array $quests): QuestGroupModel {
		$this->quests = $quests;
		return $this;
	}

	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

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
            ->withQuests(array_map(
                function ($item) {
                    return QuestModel::fromJson($item);
                },
                array_key_exists('quests', $data) && $data['quests'] !== null ? $data['quests'] : []
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "questGroupModelId" => $this->getQuestGroupModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "quests" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getQuests() !== null && $this->getQuests() !== null ? $this->getQuests() : []
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
        );
    }
}