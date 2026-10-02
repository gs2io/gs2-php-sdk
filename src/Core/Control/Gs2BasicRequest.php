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
namespace Gs2\Core\Control;


abstract class Gs2BasicRequest {

	/**
     * GS2 client ID
     * @var string
     */
	private $xGs2ClientId;

    /**
     * GS2 request ID
     * @var string
     */
    private $xGs2RequestId;

    /**
     * Context stack
     * @var string
     */
    private $contextStack;

	/**
	 * Get the GS2 client ID.
	 * 
	 * @return string GS2 client ID
	 */
	function getxGs2ClientId(): string {
		return $this->xGs2ClientId;
	}

	/**
	 * Set the GS2 client ID.
	 * Normally computed automatically; there is no need to set it.
	 * 
	 * @param string $xGs2ClientId GS2 client ID
	 */
	function setxGs2ClientId(string $xGs2ClientId): void {
		$this->xGs2ClientId = $xGs2ClientId;
	}

	/**
	 * Set the GS2 client ID.
	 * Normally computed automatically; there is no need to set it.
	 * 
	 * @param string $xGs2ClientId GS2 client ID
     * @return self
	 */
    function withxGs2ClientId(string $xGs2ClientId): self {
		$this->setxGs2ClientId($xGs2ClientId);
		return $this;
	}

    /**
     * Get the context stack.
     *
     * @return string|null Context stack
     */
    function getContextStack() {
        return $this->contextStack;
    }

    /**
     * Set the context stack.
     *
     * @param string $contextStack Context stack
     */
    function setContextStack(string $contextStack): void {
        $this->contextStack = $contextStack;
    }

    /**
     * Set the context stack.
     *
     * @param string $contextStack Context stack
     * @return self
     */
    function withContextStack(string $contextStack): self {
        $this->setContextStack($contextStack);
        return $this;
    }

    /**
     * Get the GS2 request ID.
     *
     * @return string|null GS2 request ID
     */
    function getRequestId() {
        return $this->xGs2RequestId;
    }

    /**
     * Set the GS2 request ID.
     *
     * @param string $xGs2RequestId GS2 request ID
     */
    function setRequestId(string $xGs2RequestId): void {
        $this->xGs2RequestId = $xGs2RequestId;
    }

    /**
     * Set the GS2 request ID.
     *
     * @param string $xGs2RequestId GS2 request ID
     * @return self
     */
    function withRequestId(string $xGs2RequestId): self {
        $this->setRequestId($xGs2RequestId);
        return $this;
    }

}
