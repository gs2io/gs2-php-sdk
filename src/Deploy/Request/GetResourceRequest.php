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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getResource: Get Resource
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#getresource
 */
class GetResourceRequest extends Gs2BasicRequest {
    /** @var string Stack name */
    private $stackName;
    /** @var string Resource name */
    private $resourceName;
    /** @return string|null Stack name */
	public function getStackName(): ?string {
		return $this->stackName;
	}
    /** @param string|null $stackName Stack name */
	public function setStackName(?string $stackName) {
		$this->stackName = $stackName;
	}
    /**
     * @param string|null $stackName Stack name
     * @return GetResourceRequest
     */
	public function withStackName(?string $stackName): GetResourceRequest {
		$this->stackName = $stackName;
		return $this;
	}
    /** @return string|null Resource name */
	public function getResourceName(): ?string {
		return $this->resourceName;
	}
    /** @param string|null $resourceName Resource name */
	public function setResourceName(?string $resourceName) {
		$this->resourceName = $resourceName;
	}
    /**
     * @param string|null $resourceName Resource name
     * @return GetResourceRequest
     */
	public function withResourceName(?string $resourceName): GetResourceRequest {
		$this->resourceName = $resourceName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetResourceRequest {
        if ($data === null) {
            return null;
        }
        return (new GetResourceRequest())
            ->withStackName(array_key_exists('stackName', $data) && $data['stackName'] !== null ? $data['stackName'] : null)
            ->withResourceName(array_key_exists('resourceName', $data) && $data['resourceName'] !== null ? $data['resourceName'] : null);
    }

    public function toJson(): array {
        return array(
            "stackName" => $this->getStackName(),
            "resourceName" => $this->getResourceName(),
        );
    }
}