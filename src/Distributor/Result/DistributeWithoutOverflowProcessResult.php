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
 * Result of distributeWithoutOverflowProcess: Distribute possessions (no bailout in case of overflow)
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#distributewithoutoverflowprocess
 */
class DistributeWithoutOverflowProcessResult implements IResult {
    /** @var DistributeResource Processed DistributeResource */
    private $distributeResource;
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
     * @return DistributeWithoutOverflowProcessResult
     */
	public function withDistributeResource(?DistributeResource $distributeResource): DistributeWithoutOverflowProcessResult {
		$this->distributeResource = $distributeResource;
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
     * @return DistributeWithoutOverflowProcessResult
     */
	public function withResult(?string $result): DistributeWithoutOverflowProcessResult {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributeWithoutOverflowProcessResult {
        if ($data === null) {
            return null;
        }
        return (new DistributeWithoutOverflowProcessResult())
            ->withDistributeResource(array_key_exists('distributeResource', $data) && $data['distributeResource'] !== null ? DistributeResource::fromJson($data['distributeResource']) : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null);
    }

    public function toJson(): array {
        return array(
            "distributeResource" => $this->getDistributeResource() !== null ? $this->getDistributeResource()->toJson() : null,
            "result" => $this->getResult(),
        );
    }
}