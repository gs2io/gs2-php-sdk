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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\SkillTree\Model\ConsumeAction;

class UpdateStatusModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $nodeModelName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $releaseConsumeActions;
    /** @var float */
    private $restrainReturnRate;
    /** @var array */
    private $premiseNodeNames;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateStatusModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getNodeModelName(): ?string {
		return $this->nodeModelName;
	}
	public function setNodeModelName(?string $nodeModelName) {
		$this->nodeModelName = $nodeModelName;
	}
	public function withNodeModelName(?string $nodeModelName): UpdateStatusModelMasterRequest {
		$this->nodeModelName = $nodeModelName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateStatusModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateStatusModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getReleaseConsumeActions(): ?array {
		return $this->releaseConsumeActions;
	}
	public function setReleaseConsumeActions(?array $releaseConsumeActions) {
		$this->releaseConsumeActions = $releaseConsumeActions;
	}
	public function withReleaseConsumeActions(?array $releaseConsumeActions): UpdateStatusModelMasterRequest {
		$this->releaseConsumeActions = $releaseConsumeActions;
		return $this;
	}
	public function getRestrainReturnRate(): ?float {
		return $this->restrainReturnRate;
	}
	public function setRestrainReturnRate(?float $restrainReturnRate) {
		$this->restrainReturnRate = $restrainReturnRate;
	}
	public function withRestrainReturnRate(?float $restrainReturnRate): UpdateStatusModelMasterRequest {
		$this->restrainReturnRate = $restrainReturnRate;
		return $this;
	}
	public function getPremiseNodeNames(): ?array {
		return $this->premiseNodeNames;
	}
	public function setPremiseNodeNames(?array $premiseNodeNames) {
		$this->premiseNodeNames = $premiseNodeNames;
	}
	public function withPremiseNodeNames(?array $premiseNodeNames): UpdateStatusModelMasterRequest {
		$this->premiseNodeNames = $premiseNodeNames;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStatusModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStatusModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withNodeModelName(array_key_exists('nodeModelName', $data) && $data['nodeModelName'] !== null ? $data['nodeModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withReleaseConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('releaseConsumeActions', $data) && $data['releaseConsumeActions'] !== null ? $data['releaseConsumeActions'] : []
            ))
            ->withRestrainReturnRate(array_key_exists('restrainReturnRate', $data) && $data['restrainReturnRate'] !== null ? $data['restrainReturnRate'] : null)
            ->withPremiseNodeNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('premiseNodeNames', $data) && $data['premiseNodeNames'] !== null ? $data['premiseNodeNames'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "nodeModelName" => $this->getNodeModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "releaseConsumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReleaseConsumeActions() !== null && $this->getReleaseConsumeActions() !== null ? $this->getReleaseConsumeActions() : []
            ),
            "restrainReturnRate" => $this->getRestrainReturnRate(),
            "premiseNodeNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getPremiseNodeNames() !== null && $this->getPremiseNodeNames() !== null ? $this->getPremiseNodeNames() : []
            ),
        );
    }
}