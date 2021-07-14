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

class UpdateQuestGroupModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $questGroupName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $challengePeriodEventId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateQuestGroupModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}

	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}

	public function withQuestGroupName(?string $questGroupName): UpdateQuestGroupModelMasterRequest {
		$this->questGroupName = $questGroupName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateQuestGroupModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateQuestGroupModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	public function withChallengePeriodEventId(?string $challengePeriodEventId): UpdateQuestGroupModelMasterRequest {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateQuestGroupModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateQuestGroupModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withQuestGroupName(empty($data['questGroupName']) ? null : $data['questGroupName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withChallengePeriodEventId(empty($data['challengePeriodEventId']) ? null : $data['challengePeriodEventId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "questGroupName" => $this->getQuestGroupName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
        );
    }
}