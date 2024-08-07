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


class QuestModel implements IModel {
	/**
     * @var string
	 */
	private $questModelId;
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
	private $verifyActions;
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
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}
	public function withQuestModelId(?string $questModelId): QuestModel {
		$this->questModelId = $questModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): QuestModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): QuestModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getContents(): ?array {
		return $this->contents;
	}
	public function setContents(?array $contents) {
		$this->contents = $contents;
	}
	public function withContents(?array $contents): QuestModel {
		$this->contents = $contents;
		return $this;
	}
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
	public function getFirstCompleteAcquireActions(): ?array {
		return $this->firstCompleteAcquireActions;
	}
	public function setFirstCompleteAcquireActions(?array $firstCompleteAcquireActions) {
		$this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
	}
	public function withFirstCompleteAcquireActions(?array $firstCompleteAcquireActions): QuestModel {
		$this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
		return $this;
	}
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
	public function withVerifyActions(?array $verifyActions): QuestModel {
		$this->verifyActions = $verifyActions;
		return $this;
	}
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
	public function withConsumeActions(?array $consumeActions): QuestModel {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	public function getFailedAcquireActions(): ?array {
		return $this->failedAcquireActions;
	}
	public function setFailedAcquireActions(?array $failedAcquireActions) {
		$this->failedAcquireActions = $failedAcquireActions;
	}
	public function withFailedAcquireActions(?array $failedAcquireActions): QuestModel {
		$this->failedAcquireActions = $failedAcquireActions;
		return $this;
	}
	public function getPremiseQuestNames(): ?array {
		return $this->premiseQuestNames;
	}
	public function setPremiseQuestNames(?array $premiseQuestNames) {
		$this->premiseQuestNames = $premiseQuestNames;
	}
	public function withPremiseQuestNames(?array $premiseQuestNames): QuestModel {
		$this->premiseQuestNames = $premiseQuestNames;
		return $this;
	}

    public static function fromJson(?array $data): ?QuestModel {
        if ($data === null) {
            return null;
        }
        return (new QuestModel())
            ->withQuestModelId(array_key_exists('questModelId', $data) && $data['questModelId'] !== null ? $data['questModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ->withVerifyActions(array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                array_key_exists('verifyActions', $data) && $data['verifyActions'] !== null ? $data['verifyActions'] : []
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
            ));
    }

    public function toJson(): array {
        return array(
            "questModelId" => $this->getQuestModelId(),
            "name" => $this->getName(),
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
            "verifyActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyActions() !== null && $this->getVerifyActions() !== null ? $this->getVerifyActions() : []
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
        );
    }
}