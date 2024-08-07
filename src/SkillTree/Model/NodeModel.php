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

namespace Gs2\SkillTree\Model;

use Gs2\Core\Model\IModel;


class NodeModel implements IModel {
	/**
     * @var string
	 */
	private $nodeModelId;
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
	private $releaseVerifyActions;
	/**
     * @var array
	 */
	private $releaseConsumeActions;
	/**
     * @var array
	 */
	private $returnAcquireActions;
	/**
     * @var float
	 */
	private $restrainReturnRate;
	/**
     * @var array
	 */
	private $premiseNodeNames;
	public function getNodeModelId(): ?string {
		return $this->nodeModelId;
	}
	public function setNodeModelId(?string $nodeModelId) {
		$this->nodeModelId = $nodeModelId;
	}
	public function withNodeModelId(?string $nodeModelId): NodeModel {
		$this->nodeModelId = $nodeModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): NodeModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): NodeModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getReleaseVerifyActions(): ?array {
		return $this->releaseVerifyActions;
	}
	public function setReleaseVerifyActions(?array $releaseVerifyActions) {
		$this->releaseVerifyActions = $releaseVerifyActions;
	}
	public function withReleaseVerifyActions(?array $releaseVerifyActions): NodeModel {
		$this->releaseVerifyActions = $releaseVerifyActions;
		return $this;
	}
	public function getReleaseConsumeActions(): ?array {
		return $this->releaseConsumeActions;
	}
	public function setReleaseConsumeActions(?array $releaseConsumeActions) {
		$this->releaseConsumeActions = $releaseConsumeActions;
	}
	public function withReleaseConsumeActions(?array $releaseConsumeActions): NodeModel {
		$this->releaseConsumeActions = $releaseConsumeActions;
		return $this;
	}
	public function getReturnAcquireActions(): ?array {
		return $this->returnAcquireActions;
	}
	public function setReturnAcquireActions(?array $returnAcquireActions) {
		$this->returnAcquireActions = $returnAcquireActions;
	}
	public function withReturnAcquireActions(?array $returnAcquireActions): NodeModel {
		$this->returnAcquireActions = $returnAcquireActions;
		return $this;
	}
	public function getRestrainReturnRate(): ?float {
		return $this->restrainReturnRate;
	}
	public function setRestrainReturnRate(?float $restrainReturnRate) {
		$this->restrainReturnRate = $restrainReturnRate;
	}
	public function withRestrainReturnRate(?float $restrainReturnRate): NodeModel {
		$this->restrainReturnRate = $restrainReturnRate;
		return $this;
	}
	public function getPremiseNodeNames(): ?array {
		return $this->premiseNodeNames;
	}
	public function setPremiseNodeNames(?array $premiseNodeNames) {
		$this->premiseNodeNames = $premiseNodeNames;
	}
	public function withPremiseNodeNames(?array $premiseNodeNames): NodeModel {
		$this->premiseNodeNames = $premiseNodeNames;
		return $this;
	}

    public static function fromJson(?array $data): ?NodeModel {
        if ($data === null) {
            return null;
        }
        return (new NodeModel())
            ->withNodeModelId(array_key_exists('nodeModelId', $data) && $data['nodeModelId'] !== null ? $data['nodeModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withReleaseVerifyActions(array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                array_key_exists('releaseVerifyActions', $data) && $data['releaseVerifyActions'] !== null ? $data['releaseVerifyActions'] : []
            ))
            ->withReleaseConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('releaseConsumeActions', $data) && $data['releaseConsumeActions'] !== null ? $data['releaseConsumeActions'] : []
            ))
            ->withReturnAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('returnAcquireActions', $data) && $data['returnAcquireActions'] !== null ? $data['returnAcquireActions'] : []
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
            "nodeModelId" => $this->getNodeModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "releaseVerifyActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReleaseVerifyActions() !== null && $this->getReleaseVerifyActions() !== null ? $this->getReleaseVerifyActions() : []
            ),
            "releaseConsumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReleaseConsumeActions() !== null && $this->getReleaseConsumeActions() !== null ? $this->getReleaseConsumeActions() : []
            ),
            "returnAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReturnAcquireActions() !== null && $this->getReturnAcquireActions() !== null ? $this->getReturnAcquireActions() : []
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