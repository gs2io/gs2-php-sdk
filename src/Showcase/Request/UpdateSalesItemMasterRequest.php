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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Showcase\Model\VerifyAction;
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;

/**
 * Request for updateSalesItemMaster: Update Sales Item Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#updatesalesitemmaster
 */
class UpdateSalesItemMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Sales Item name */
    private $salesItemName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array List of Verify Actions */
    private $verifyActions;
    /** @var array List of Consume Actions */
    private $consumeActions;
    /** @var array List of Acquire Actions */
    private $acquireActions;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateSalesItemMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateSalesItemMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Sales Item name */
	public function getSalesItemName(): ?string {
		return $this->salesItemName;
	}
    /** @param string|null $salesItemName Sales Item name */
	public function setSalesItemName(?string $salesItemName) {
		$this->salesItemName = $salesItemName;
	}
    /**
     * @param string|null $salesItemName Sales Item name
     * @return UpdateSalesItemMasterRequest
     */
	public function withSalesItemName(?string $salesItemName): UpdateSalesItemMasterRequest {
		$this->salesItemName = $salesItemName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateSalesItemMasterRequest
     */
	public function withDescription(?string $description): UpdateSalesItemMasterRequest {
		$this->description = $description;
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
     * @return UpdateSalesItemMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateSalesItemMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Verify Actions */
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
    /** @param array|null $verifyActions List of Verify Actions */
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
    /**
     * @param array|null $verifyActions List of Verify Actions
     * @return UpdateSalesItemMasterRequest
     */
	public function withVerifyActions(?array $verifyActions): UpdateSalesItemMasterRequest {
		$this->verifyActions = $verifyActions;
		return $this;
	}
    /** @return array|null List of Consume Actions */
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
    /** @param array|null $consumeActions List of Consume Actions */
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
    /**
     * @param array|null $consumeActions List of Consume Actions
     * @return UpdateSalesItemMasterRequest
     */
	public function withConsumeActions(?array $consumeActions): UpdateSalesItemMasterRequest {
		$this->consumeActions = $consumeActions;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of Acquire Actions
     * @return UpdateSalesItemMasterRequest
     */
	public function withAcquireActions(?array $acquireActions): UpdateSalesItemMasterRequest {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateSalesItemMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateSalesItemMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSalesItemName(array_key_exists('salesItemName', $data) && $data['salesItemName'] !== null ? $data['salesItemName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withVerifyActions(!array_key_exists('verifyActions', $data) || $data['verifyActions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['verifyActions']
            ))
            ->withConsumeActions(!array_key_exists('consumeActions', $data) || $data['consumeActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['consumeActions']
            ))
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "salesItemName" => $this->getSalesItemName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "verifyActions" => $this->getVerifyActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyActions()
            ),
            "consumeActions" => $this->getConsumeActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions()
            ),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
        );
    }
}