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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;
use Gs2\Distributor\Model\DistributeResource;

/**
 * Result of distribute: Distribution of possessions
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#distribute
 */
class DistributeResult implements IResult {
    /** @var DistributeResource Processed DistributeResource */
    private $distributeResource;
    /** @var string GRN of the Namespace of the gift box to be forwarded when the holdings are over capacity. */
    private $inboxNamespaceId;
    /** @var string Response content */
    private $result;

    /** @return DistributeResource|null Processed DistributeResource */
	public function getDistributeResource(): ?DistributeResource {
		return $this->distributeResource;
	}

    /** @param DistributeResource|null $distributeResource Processed DistributeResource */
	public function setDistributeResource(?DistributeResource $distributeResource) {
		$this->distributeResource = $distributeResource;
	}

    /**
     * @param DistributeResource|null $distributeResource Processed DistributeResource
     * @return DistributeResult
     */
	public function withDistributeResource(?DistributeResource $distributeResource): DistributeResult {
		$this->distributeResource = $distributeResource;
		return $this;
	}

    /** @return string|null GRN of the Namespace of the gift box to be forwarded when the holdings are over capacity. */
	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}

    /** @param string|null $inboxNamespaceId GRN of the Namespace of the gift box to be forwarded when the holdings are over capacity. */
	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}

    /**
     * @param string|null $inboxNamespaceId GRN of the Namespace of the gift box to be forwarded when the holdings are over capacity.
     * @return DistributeResult
     */
	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributeResult {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}

    /** @return string|null Response content */
	public function getResult(): ?string {
		return $this->result;
	}

    /** @param string|null $result Response content */
	public function setResult(?string $result) {
		$this->result = $result;
	}

    /**
     * @param string|null $result Response content
     * @return DistributeResult
     */
	public function withResult(?string $result): DistributeResult {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributeResult {
        if ($data === null) {
            return null;
        }
        return (new DistributeResult())
            ->withDistributeResource(array_key_exists('distributeResource', $data) && $data['distributeResource'] !== null ? DistributeResource::fromJson($data['distributeResource']) : null)
            ->withInboxNamespaceId(array_key_exists('inboxNamespaceId', $data) && $data['inboxNamespaceId'] !== null ? $data['inboxNamespaceId'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null);
    }

    public function toJson(): array {
        return array(
            "distributeResource" => $this->getDistributeResource() !== null ? $this->getDistributeResource()->toJson() : null,
            "inboxNamespaceId" => $this->getInboxNamespaceId(),
            "result" => $this->getResult(),
        );
    }
}