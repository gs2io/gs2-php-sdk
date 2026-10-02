<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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
namespace Gs2\Core\Model;

use InvalidArgumentException;

/**
 * Credential based on an access key.
 * 
 * @author Game Server Services, Inc.
 *
 */
class BasicGs2Credential implements IGs2Credential {
	
	/**
     * Client ID
     * @var string
     */
    private $clientId;

    /**
     * Client secret
     * @var string
     */
    private $clientSecret;

    /**
     * Project token
     * @var string
     */
    private $projectToken;

    /**
	 * Constructor.
	 * 
	 * @param string $clientId Client ID
	 * @param string $clientSecret Client secret
	 */
	public function __construct(string $clientId, string $clientSecret) {
		if($clientId == null || $clientSecret == null) {
			throw new InvalidArgumentException("invalid credential");
		}
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
	}

	/**
	 * Get the client ID.
	 * 
	 * @return string Client ID
	 */
	public function getClientId(): string {
		return $this->clientId;
	}
	
	/**
	 * Get the client secret.
	 * 
	 * @return string Client secret
	 */
	public function getClientSecret(): string {
		return $this->clientSecret;
	}

    /**
     * Get the project token.
     *
     * @return string Project token
     */
    public function getProjectToken() {
		return $this->projectToken;
	}

    /**
     * Set the project token.
     * @param string $projectToken Project token
     */
    public function setProjectToken(string $projectToken) {
		$this->projectToken = $projectToken;
	}
}
