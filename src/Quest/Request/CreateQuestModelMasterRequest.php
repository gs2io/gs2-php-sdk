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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\AcquireAction;
use Gs2\Quest\Model\Contents;
use Gs2\Quest\Model\ConsumeAction;

class CreateQuestModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $questGroupName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $contents;
    /** @var string */
    private $challengePeriodEventId;
    /** @var array */
    private $consumeActions;
    /** @var array */
    private $failedAcquireActions;
    /** @var array */
    private $premiseQuestNames;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateQuestModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}

	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}

	public function withQuestGroupName(?string $questGroupName): CreateQuestModelMasterRequest {
		$this->questGroupName = $questGroupName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateQuestModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateQuestModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateQuestModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getContents(): ?array {
		return $this->contents;
	}

	public function setContents(?array $contents) {
		$this->contents = $contents;
	}

	public function withContents(?array $contents): CreateQuestModelMasterRequest {
		$this->contents = $contents;
		return $this;
	}

	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	public function withChallengePeriodEventId(?string $challengePeriodEventId): CreateQuestModelMasterRequest {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}

	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}

	public function withConsumeActions(?array $consumeActions): CreateQuestModelMasterRequest {
		$this->consumeActions = $consumeActions;
		return $this;
	}

	public function getFailedAcquireActions(): ?array {
		return $this->failedAcquireActions;
	}

	public function setFailedAcquireActions(?array $failedAcquireActions) {
		$this->failedAcquireActions = $failedAcquireActions;
	}

	public function withFailedAcquireActions(?array $failedAcquireActions): CreateQuestModelMasterRequest {
		$this->failedAcquireActions = $failedAcquireActions;
		return $this;
	}

	public function getPremiseQuestNames(): ?array {
		return $this->premiseQuestNames;
	}

	public function setPremiseQuestNames(?array $premiseQuestNames) {
		$this->premiseQuestNames = $premiseQuestNames;
	}

	public function withPremiseQuestNames(?array $premiseQuestNames): CreateQuestModelMasterRequest {
		$this->premiseQuestNames = $premiseQuestNames;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateQuestModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateQuestModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withQuestGroupName(empty($data['questGroupName']) ? null : $data['questGroupName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withContents(array_map(
                function ($item) {
                    return Contents::fromJson($item);
                },
                array_key_exists('contents', $data) && $data['contents'] !== null ? $data['contents'] : []
            ))
            ->withChallengePeriodEventId(empty($data['challengePeriodEventId']) ? null : $data['challengePeriodEventId'])
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
            "namespaceName" => $this->getNamespaceName(),
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