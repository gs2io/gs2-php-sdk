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


class QuestModelMaster implements IModel {
	/**
     * @var string
	 */
	private $questModelId;
	/**
     * @var string
	 */
	private $questGroupName;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $contents;
	/**
     * @var string
	 */
	private $challengePeriodEventId;
	/**
     * @var array
	 */
	private $firstCompleteAcquireActions;
	/**
     * @var array
	 */
	private $consumeActions;
	/**
     * @var array
	 */
	private $failedAcquireActions;
	/**
     * @var array
	 */
	private $premiseQuestNames;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}
	public function withQuestModelId(?string $questModelId): QuestModelMaster {
		$this->questModelId = $questModelId;
		return $this;
	}
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}
	public function withQuestGroupName(?string $questGroupName): QuestModelMaster {
		$this->questGroupName = $questGroupName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): QuestModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): QuestModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): QuestModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getContents(): ?array {
		return $this->contents;
	}
	public function setContents(?array $contents) {
		$this->contents = $contents;
	}
	public function withContents(?array $contents): QuestModelMaster {
		$this->contents = $contents;
		return $this;
	}
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
	public function getFirstCompleteAcquireActions(): ?array {
		return $this->firstCompleteAcquireActions;
	}
	public function setFirstCompleteAcquireActions(?array $firstCompleteAcquireActions) {
		$this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
	}
	public function withFirstCompleteAcquireActions(?array $firstCompleteAcquireActions): QuestModelMaster {
		$this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
		return $this;
	}
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
	public function withConsumeActions(?array $consumeActions): QuestModelMaster {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	public function getFailedAcquireActions(): ?array {
		return $this->failedAcquireActions;
	}
	public function setFailedAcquireActions(?array $failedAcquireActions) {
		$this->failedAcquireActions = $failedAcquireActions;
	}
	public function withFailedAcquireActions(?array $failedAcquireActions): QuestModelMaster {
		$this->failedAcquireActions = $failedAcquireActions;
		return $this;
	}
	public function getPremiseQuestNames(): ?array {
		return $this->premiseQuestNames;
	}
	public function setPremiseQuestNames(?array $premiseQuestNames) {
		$this->premiseQuestNames = $premiseQuestNames;
	}
	public function withPremiseQuestNames(?array $premiseQuestNames): QuestModelMaster {
		$this->premiseQuestNames = $premiseQuestNames;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): QuestModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): QuestModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?QuestModelMaster {
        if ($data === null) {
            return null;
        }
        return (new QuestModelMaster())
            ->withQuestModelId(array_key_exists('questModelId', $data) && $data['questModelId'] !== null ? $data['questModelId'] : null)
            ->withQuestGroupName(array_key_exists('questGroupName', $data) && $data['questGroupName'] !== null ? $data['questGroupName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withContents(array_map(
                function ($item) {
                    return Contents::fromJson($item);
                },
                array_key_exists('contents', $data) && $data['contents'] !== null ? $data['contents'] : []
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null)
            ->withFirstCompleteAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('firstCompleteAcquireActions', $data) && $data['firstCompleteAcquireActions'] !== null ? $data['firstCompleteAcquireActions'] : []
            ))
            ->withConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('consumeActions', $data) && $data['consumeActions'] !== null ? $data['consumeActions'] : []
            ))
            ->withFailedAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('failedAcquireActions', $data) && $data['failedAcquireActions'] !== null ? $data['failedAcquireActions'] : []
            ))
            ->withPremiseQuestNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('premiseQuestNames', $data) && $data['premiseQuestNames'] !== null ? $data['premiseQuestNames'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "questModelId" => $this->getQuestModelId(),
            "questGroupName" => $this->getQuestGroupName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "contents" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getContents() !== null && $this->getContents() !== null ? $this->getContents() : []
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
            "firstCompleteAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFirstCompleteAcquireActions() !== null && $this->getFirstCompleteAcquireActions() !== null ? $this->getFirstCompleteAcquireActions() : []
            ),
            "consumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions() !== null && $this->getConsumeActions() !== null ? $this->getConsumeActions() : []
            ),
            "failedAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFailedAcquireActions() !== null && $this->getFailedAcquireActions() !== null ? $this->getFailedAcquireActions() : []
            ),
            "premiseQuestNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getPremiseQuestNames() !== null && $this->getPremiseQuestNames() !== null ? $this->getPremiseQuestNames() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}