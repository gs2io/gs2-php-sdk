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

class UpdateSalesItemMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $salesItemName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $verifyActions;
    /** @var array */
    private $consumeActions;
    /** @var array */
    private $acquireActions;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateSalesItemMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getSalesItemName(): ?string {
		return $this->salesItemName;
	}
	public function setSalesItemName(?string $salesItemName) {
		$this->salesItemName = $salesItemName;
	}
	public function withSalesItemName(?string $salesItemName): UpdateSalesItemMasterRequest {
		$this->salesItemName = $salesItemName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateSalesItemMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateSalesItemMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
	public function withVerifyActions(?array $verifyActions): UpdateSalesItemMasterRequest {
		$this->verifyActions = $verifyActions;
		return $this;
	}
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
	public function withConsumeActions(?array $consumeActions): UpdateSalesItemMasterRequest {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
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
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "salesItemName" => $this->getSalesItemName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
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
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
        );
    }
}